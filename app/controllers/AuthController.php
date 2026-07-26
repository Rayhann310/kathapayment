<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function loginForm()
    {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user_id'])) {
            redirect('dashboard');
        }
        $this->view('auth/login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('login');
        }
        $this->verifyCsrf();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            // Success
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            
            // Redirect based on role
            redirect('dashboard');
        } else {
            // Failed
            $_SESSION['error'] = 'Invalid email or password.';
            redirect('login');
        }
    }

    public function registerForm()
    {
        if (isset($_SESSION['user_id'])) {
            redirect('dashboard');
        }
        $this->view('auth/register');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('register');
        }
        $this->verifyCsrf();

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        
        if ($userModel->findByEmail($email)) {
            $_SESSION['error'] = 'Email is already registered.';
            redirect('register');
        }

        $userId = $userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'merchant_owner' // Default role for new signups
        ]);

        if ($userId) {
            // Auto login after registration
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_role'] = 'merchant_owner';
            
            // Generate basic merchant profile
            $db = \App\Providers\Database::getInstance()->getConnection();
            $merchantId = 'M-' . strtoupper(substr(uniqid(), -6));
            $db->prepare("
                INSERT INTO merchants (id, user_id, merchant_id, name, public_key, secret_key, status) 
                VALUES (UUID(), ?, ?, ?, ?, ?, 'active')
            ")->execute([
                $userId, 
                $merchantId, 
                $name . ' Store', 
                'pk_live_' . bin2hex(random_bytes(16)), 
                'sk_live_' . bin2hex(random_bytes(16))
            ]);

            redirect('dashboard');
        } else {
            $_SESSION['error'] = 'Failed to create account. Please try again.';
            redirect('register');
        }
    }

    public function forgotPassword()
    {
        if (isset($_SESSION['user_id'])) {
            redirect('dashboard');
        }
        $this->view('auth/forgot_password');
    }

    public function sendResetLink()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('forgot-password');
        }
        $this->verifyCsrf();

        $email = $_POST['email'] ?? '';
        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $db = \App\Providers\Database::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
            $stmt->execute([$email, $token]);
            
            // Dummy mailer logging
            $logMsg = "[" . date('Y-m-d H:i:s') . "] Password Reset for $email: " . base_url("reset-password?token=$token") . PHP_EOL;
            file_put_contents(BASE_PATH . '/storage/logs/mail.log', $logMsg, FILE_APPEND);
            
            $_SESSION['success'] = 'If your email is registered, a password reset link has been sent.';
        } else {
            $_SESSION['success'] = 'If your email is registered, a password reset link has been sent.';
        }
        redirect('forgot-password');
    }

    public function resetPasswordForm()
    {
        if (isset($_SESSION['user_id'])) {
            redirect('dashboard');
        }
        
        $token = $_GET['token'] ?? '';
        if (empty($token)) {
            $_SESSION['error'] = 'Invalid password reset token.';
            redirect('login');
        }
        
        $db = \App\Providers\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT email FROM password_resets WHERE token = ? ORDER BY created_at DESC LIMIT 1");
        $stmt->execute([$token]);
        $reset = $stmt->fetch();
        
        if (!$reset) {
            $_SESSION['error'] = 'Invalid or expired password reset token.';
            redirect('login');
        }

        $this->view('auth/reset_password');
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('login');
        }
        $this->verifyCsrf();

        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        if (empty($token) || empty($password) || empty($passwordConfirm)) {
            $_SESSION['error'] = 'All fields are required.';
            redirect('reset-password?token=' . urlencode($token));
        }

        if ($password !== $passwordConfirm) {
            $_SESSION['error'] = 'Passwords do not match.';
            redirect('reset-password?token=' . urlencode($token));
        }

        $db = \App\Providers\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT email FROM password_resets WHERE token = ? ORDER BY created_at DESC LIMIT 1");
        $stmt->execute([$token]);
        $reset = $stmt->fetch();

        if (!$reset) {
            $_SESSION['error'] = 'Invalid or expired password reset token.';
            redirect('login');
        }

        $email = $reset['email'];
        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if ($user) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->execute([$hashedPassword, $email]);
            
            // Delete all reset tokens for this email
            $stmt = $db->prepare("DELETE FROM password_resets WHERE email = ?");
            $stmt->execute([$email]);
            
            $_SESSION['success'] = 'Your password has been successfully reset. You can now login.';
            redirect('login');
        } else {
            $_SESSION['error'] = 'User not found.';
            redirect('login');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
