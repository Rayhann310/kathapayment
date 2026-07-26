<?php

// API Routes (JSON Endpoints)
$router->get('/api/health', function() {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'message' => 'API is running']);
});

// Invoice API
$router->post('/api/v1/invoices', 'Api\InvoiceController@create');

// Example API Controller Route (to be added later)
// $router->post('/api/v1/payment/charge', 'PaymentController@charge');
