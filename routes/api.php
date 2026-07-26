<?php

// API Routes (JSON Endpoints)
$router->get('/api/health', function() {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'message' => 'API is running']);
});

// Invoice API
$router->post('/api/v1/invoices', 'Api\InvoiceController@create');
$router->get('/api/v1/invoices/{id}', 'Api\InvoiceController@show');

// Live Demo API
$router->get('/api/demo/status', 'DemoController@apiStatus');
$router->post('/api/demo/pay', 'DemoController@apiPay');

// Example API Controller Route (to be added later)
// $router->post('/api/v1/payment/charge', 'PaymentController@charge');
