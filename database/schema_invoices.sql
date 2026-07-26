-- Invoices and Payments Schema

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `merchant_id` CHAR(36) NOT NULL,
  `invoice_number` VARCHAR(50) NOT NULL UNIQUE,
  `amount` DECIMAL(15,2) NOT NULL,
  `currency` VARCHAR(3) DEFAULT 'IDR',
  `status` ENUM('pending', 'waiting', 'paid', 'failed', 'expired', 'cancelled', 'refund') DEFAULT 'pending',
  `customer_name` VARCHAR(100) NULL,
  `customer_email` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `expired_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `payments` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `invoice_id` CHAR(36) NOT NULL,
  `payment_method` VARCHAR(50) NOT NULL,
  `amount` DECIMAL(15,2) NOT NULL,
  `fee` DECIMAL(15,2) DEFAULT 0.00,
  `status` ENUM('pending', 'success', 'failed', 'refunded', 'chargeback') DEFAULT 'pending',
  `reference_id` VARCHAR(100) NULL,
  `paid_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`invoice_id`) REFERENCES `invoices`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
