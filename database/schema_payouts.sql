-- Payouts / Withdrawals Table

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `merchant_id` CHAR(36) NOT NULL,
  `amount` DECIMAL(15,2) NOT NULL,
  `bank_name` VARCHAR(100) NOT NULL,
  `account_number` VARCHAR(50) NOT NULL,
  `account_name` VARCHAR(100) NOT NULL,
  `status` ENUM('pending', 'processing', 'completed', 'rejected') DEFAULT 'pending',
  `admin_note` TEXT NULL,
  `processed_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
