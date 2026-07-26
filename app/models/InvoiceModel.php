<?php

namespace App\Models;

use App\Core\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';

    public function findByInvoiceNumber($invoiceNumber)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE invoice_number = :invoice_number LIMIT 1");
        $stmt->bindParam(':invoice_number', $invoiceNumber);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $id = bin2hex(random_bytes(18));
        $invoiceNumber = 'INV-' . date('Y') . '-' . strtoupper(substr(uniqid(), -6));
        
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} 
            (id, merchant_id, invoice_number, amount, currency, customer_name, customer_email, description, expired_at) 
            VALUES 
            (:id, :merchant_id, :invoice_number, :amount, :currency, :customer_name, :customer_email, :description, :expired_at)
        ");

        $currency = $data['currency'] ?? 'IDR';
        
        // Default expiry: 24 hours
        $expiredAt = date('Y-m-d H:i:s', strtotime('+24 hours'));

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':merchant_id', $data['merchant_id']);
        $stmt->bindParam(':invoice_number', $invoiceNumber);
        $stmt->bindParam(':amount', $data['amount']);
        $stmt->bindParam(':currency', $currency);
        $stmt->bindParam(':customer_name', $data['customer_name']);
        $stmt->bindParam(':customer_email', $data['customer_email']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':expired_at', $expiredAt);

        if ($stmt->execute()) {
            return [
                'id' => $id,
                'invoice_number' => $invoiceNumber,
                'amount' => $data['amount'],
                'status' => 'pending',
                'expired_at' => $expiredAt
            ];
        }
        return false;
    }
}
