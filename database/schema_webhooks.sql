-- Webhook Logs Schema

CREATE TABLE IF NOT EXISTS `webhooks` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `merchant_id` CHAR(36) NOT NULL,
  `event_type` VARCHAR(100) NOT NULL,
  `payload` JSON NOT NULL,
  `endpoint_url` VARCHAR(255) NOT NULL,
  `status` ENUM('pending', 'success', 'failed', 'retrying') DEFAULT 'pending',
  `response_code` INT DEFAULT NULL,
  `response_body` TEXT NULL,
  `retry_count` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
