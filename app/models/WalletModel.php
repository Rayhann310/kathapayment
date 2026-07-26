<?php

namespace App\Models;

use App\Core\Model;

class WalletModel extends Model
{
    protected $table = 'wallets';

    public function findByOwner($ownerType, $ownerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE owner_type = :owner_type AND owner_id = :owner_id LIMIT 1");
        $stmt->bindParam(':owner_type', $ownerType);
        $stmt->bindParam(':owner_id', $ownerId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createOrGetWallet($ownerType, $ownerId)
    {
        $wallet = $this->findByOwner($ownerType, $ownerId);
        if ($wallet) {
            return $wallet;
        }

        $id = bin2hex(random_bytes(18));
        $stmt = $this->db->prepare("
            INSERT INTO {$this->table} (id, owner_type, owner_id, available_balance, pending_balance, locked_balance, currency) 
            VALUES (:id, :owner_type, :owner_id, 0.00, 0.00, 0.00, 'IDR')
        ");
        
        $stmt->execute([
            ':id' => $id,
            ':owner_type' => $ownerType,
            ':owner_id' => $ownerId
        ]);

        return $this->findByOwner($ownerType, $ownerId);
    }

    public function addBalance($id, $amount, $type = 'available_balance')
    {
        $allowedTypes = ['available_balance', 'pending_balance', 'locked_balance'];
        if (!in_array($type, $allowedTypes)) return false;

        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$type} = {$type} + :amount WHERE id = :id");
        return $stmt->execute([
            ':amount' => $amount,
            ':id' => $id
        ]);
    }
}
