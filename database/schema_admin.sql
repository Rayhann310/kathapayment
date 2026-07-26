-- Enterprise Admin Tables

CREATE TABLE IF NOT EXISTS `global_settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `key_name` VARCHAR(100) NOT NULL UNIQUE,
  `key_value` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed default global settings
INSERT IGNORE INTO `global_settings` (`key_name`, `key_value`, `description`) VALUES 
('fee_fixed', '4000', 'Fixed platform fee in IDR per transaction'),
('fee_percentage', '1.5', 'Percentage platform fee per transaction (e.g., 1.5 for 1.5%)');

CREATE TABLE IF NOT EXISTS `audit_logs` (
  `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
  `admin_id` CHAR(36) NOT NULL,
  `action` VARCHAR(100) NOT NULL,
  `target_id` VARCHAR(100) NULL,
  `details` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`admin_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `webhook_logs` (
  `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
  `merchant_id` CHAR(36) NOT NULL,
  `event_type` VARCHAR(100) NOT NULL,
  `endpoint` VARCHAR(255) NOT NULL,
  `payload` JSON NULL,
  `http_status` INT NULL,
  `response_body` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
