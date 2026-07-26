<?php

namespace App\Models;

use App\Core\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $id = $data['id'] ?? bin2hex(random_bytes(18)); // Fallback UUID
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (id, name, email, password, role) VALUES (:id, :name, :email, :password, :role)");
        
        // Hash password with Argon2ID
        $hashedPassword = password_hash($data['password'], PASSWORD_ARGON2ID);
        
        $role = $data['role'] ?? 'customer';

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return $id;
        }
        return false;
    }
}
