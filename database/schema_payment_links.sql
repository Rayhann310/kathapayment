-- Payment Links Schema

CREATE TABLE IF NOT EXISTS `payment_links` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `merchant_id` CHAR(36) NOT NULL,
  `slug` VARCHAR(100) NOT NULL UNIQUE COMMENT 'URL slug, e.g. ebook-masterclass',
  `name` VARCHAR(150) NOT NULL COMMENT 'Product/service name',
  `description` TEXT NULL,
  `price` DECIMAL(15,2) NOT NULL COMMENT 'Fixed price, 0 = custom amount',
  `is_flexible_price` BOOLEAN DEFAULT FALSE COMMENT 'If true, buyer can set their own amount',
  `currency` VARCHAR(3) DEFAULT 'IDR',
  `status` ENUM('active', 'inactive', 'archived') DEFAULT 'active',
  `total_sales` INT DEFAULT 0,
  `total_revenue` DECIMAL(15,2) DEFAULT 0.00,
  `image_url` VARCHAR(500) NULL,
  `redirect_url` VARCHAR(500) NULL COMMENT 'URL to redirect after payment',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`merchant_id`) REFERENCES `merchants`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add payment_link_id column to invoices if it doesn't exist (handled by self-healing)
