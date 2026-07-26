-- Schema for Live Demo Simulation

CREATE TABLE IF NOT EXISTS `demo_transactions` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
  `status` ENUM('pending', 'paid', 'expired') DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
