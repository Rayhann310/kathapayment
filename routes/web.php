<?php

// Auth Routes
$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');
$router->get('/register', 'AuthController@registerForm');
$router->post('/register', 'AuthController@register');
$router->get('/logout', 'AuthController@logout');
$router->get('/forgot-password', 'AuthController@forgotPassword');
$router->post('/forgot-password', 'AuthController@sendResetLink');
$router->get('/reset-password', 'AuthController@resetPasswordForm');
$router->post('/reset-password', 'AuthController@updatePassword');

// Public Landing Pages
$router->get('/', 'HomeController@index');
$router->get('/features', 'HomeController@features');
// Live Demo Routes
$router->get('/demo/qris', 'DemoController@qrisDisplay');
$router->get('/demo/scan', 'DemoController@mobileScanner');
$router->get('/pricing', 'HomeController@pricing');
$router->get('/about', 'HomeController@about');
$router->get('/careers', 'HomeController@careers');
$router->get('/developers', 'HomeController@developers');
$router->get('/dokumentasi', 'HomeController@dokumentasi');
$router->get('/qris', 'HomeController@qris');
$router->get('/virtual-account', 'HomeController@virtualAccount');
$router->get('/privacy', 'HomeController@privacy');
$router->get('/terms', 'HomeController@terms');
$router->get('/refund', 'HomeController@refund');
$router->get('/lang/{code}', 'HomeController@switchLang');

// Web Routes (Views and Dashboards)
$router->get('/dashboard', 'DashboardController@index');
$router->get('/invoices', 'InvoiceUIController@index');
$router->get('/invoices/{status}', 'InvoiceUIController@index');
$router->post('/invoices/create', 'InvoiceUIController@create');
$router->get('/payments', 'MerchantUIController@payments');
$router->get('/payments/{status}', 'MerchantUIController@payments');
$router->get('/payment-links', 'PaymentLinkController@index');
$router->get('/payment-links/{tab}', 'PaymentLinkController@index');
$router->post('/payment-links/create', 'PaymentLinkController@create');
$router->post('/payment-links/toggle', 'PaymentLinkController@toggle');
$router->post('/payment-links/delete', 'PaymentLinkController@delete');
$router->get('/refunds', 'MerchantUIController@refunds');
$router->get('/payment-methods', 'MerchantUIController@paymentMethods');
$router->get('/risk-analysis', 'MerchantUIController@riskAnalysis');
$router->get('/customers', 'MerchantUIController@customers');
$router->get('/apikeys', 'MerchantUIController@apikeys');
$router->post('/apikeys/roll', 'MerchantUIController@rollApiKeys');
$router->get('/webhooks', 'MerchantUIController@webhooks');
$router->post('/webhooks/update', 'MerchantUIController@updateWebhooks');
$router->get('/settings', 'MerchantUIController@settings');
$router->post('/settings/update', 'MerchantUIController@updateSettings');
$router->get('/withdrawals', 'MerchantUIController@withdrawals');
$router->post('/withdrawals/request', 'MerchantUIController@requestWithdrawal');

// Super Admin Routes
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/merchants', 'AdminController@merchants');
$router->get('/admin/merchants/detail/{id}', 'AdminController@merchantDetail');
$router->post('/admin/merchants/status', 'AdminController@updateMerchantStatus');
$router->post('/admin/merchants/roll/{id}', 'AdminController@forceRollKeys');

$router->get('/admin/users', 'AdminController@users');
$router->post('/admin/users/role', 'AdminController@updateUserRole');
$router->post('/admin/users/reset', 'AdminController@resetUserPassword');
$router->post('/admin/users/delete', 'AdminController@deleteUser');

$router->get('/admin/logs', 'AdminController@logs');
$router->get('/admin/settings', 'AdminController@settings');
$router->post('/admin/settings/update', 'AdminController@updateGlobalSettings');
$router->get('/admin/withdrawals', 'AdminController@withdrawals');
$router->post('/admin/withdrawals/process', 'AdminController@processWithdrawal');
$router->post('/admin/heal', 'AdminController@runHealing');

// Checkout / Payment Page Routes
$router->get('/pay/{id}', 'PaymentController@checkout');
$router->post('/pay/{id}/process', 'PaymentController@process');

// Example Controller Route (to be added later)
// $router->get('/login', 'AuthController@loginForm');
