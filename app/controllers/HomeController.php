<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    private function getLang()
    {
        if (isset($_SESSION['lang'])) {
            return $_SESSION['lang'];
        }

        // Auto-detect based on accept-language
        $langHeader = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        if (strpos(strtolower($langHeader), 'id') !== false || strpos(strtolower($langHeader), 'id-id') !== false) {
            $_SESSION['lang'] = 'id';
            return 'id';
        }

        $_SESSION['lang'] = 'en';
        return 'en';
    }

    private function getTranslations()
    {
        $lang = $this->getLang();
        $file = BASE_PATH . "/app/lang/{$lang}.php";
        if (file_exists($file)) {
            return require $file;
        }
        // Fallback
        return require BASE_PATH . "/app/lang/en.php";
    }

    public function switchLang($code)
    {
        if (in_array($code, ['en', 'id'])) {
            $_SESSION['lang'] = $code;
        }
        $referer = $_SERVER['HTTP_REFERER'] ?? base_url('');
        header("Location: $referer");
        exit;
    }

    public function index()
    {
        $lang = $this->getTranslations();
        $this->view('home/index', [
            'title' => 'KathaPayment - Enterprise Payment Gateway',
            'lang' => $lang,
            'current_lang' => $this->getLang()
        ]);
    }

    public function faq()
    {
        $lang = $this->getTranslations();
        $this->view('home/faq', [
            'title' => 'FAQ - KathaPayment',
            'lang' => $lang,
            'current_lang' => $this->getLang()
        ]);
    }

    public function privacy()
    {
        $lang = $this->getTranslations();
        $this->view('home/privacy', [
            'title' => 'Kebijakan Privasi - KathaPayment',
            'lang' => $lang,
            'current_lang' => $this->getLang()
        ]);
    }

    public function terms()
    {
        $lang = $this->getTranslations();
        $this->view('home/terms', [
            'title' => 'Syarat & Ketentuan - KathaPayment',
            'lang' => $lang,
            'current_lang' => $this->getLang()
        ]);
    }

    public function refund()
    {
        $lang = $this->getTranslations();
        $this->view('home/refund', [
            'title' => 'Kebijakan Refund - KathaPayment',
            'lang' => $lang,
            'current_lang' => $this->getLang()
        ]);
    }

    public function features()
    {
        $lang = $this->getTranslations();
        $this->view('home/features', ['title' => 'Features - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function pricing()
    {
        $lang = $this->getTranslations();
        $this->view('home/pricing', ['title' => 'Pricing - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function about()
    {
        $lang = $this->getTranslations();
        $this->view('home/about', ['title' => 'About Us - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function careers()
    {
        $lang = $this->getTranslations();
        $this->view('home/careers', ['title' => 'Careers - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function qris()
    {
        $lang = $this->getTranslations();
        $this->view('home/product_qris', ['title' => 'QRIS Payment - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function virtualAccount()
    {
        $lang = $this->getTranslations();
        $this->view('home/product_va', ['title' => 'Virtual Account - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function developers()
    {
        $lang = $this->getTranslations();
        $this->view('home/developers', ['title' => 'Developers - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }

    public function dokumentasi()
    {
        $lang = $this->getTranslations();
        $this->view('home/dokumentasi', ['title' => 'Dokumentasi - KathaPayment', 'lang' => $lang, 'current_lang' => $this->getLang()]);
    }
}
