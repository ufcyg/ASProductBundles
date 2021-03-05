<?php declare(strict_types=1);

namespace ASProductBundles\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\InheritanceUpdaterTrait;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1614948217Bundle extends MigrationStep
{
    use InheritanceUpdaterTrait;

    public function getCreationTimestamp(): int
    {
        return 1614948217;
    }

    public function update(Connection $connection): void
    {
        $connection->exec(
            "CREATE TABLE IF NOT EXISTS `as_bundle` (
                `id` BINARY(16) NOT NULL,
                `discount_type` VARCHAR(255) NOT NULL,
                `discount` DOUBLE NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
        );

        $connection->exec(
            "CREATE TABLE IF NOT EXISTS `as_bundle_product` (
                `bundle_id` BINARY(16) NOT NULL,
                `product_id` BINARY(16) NOT NULL,
                `product_version_id` BINARY(16) NOT NULL,
                `created_at` DATETIME(3) NOT NULL,
                PRIMARY KEY (`bundle_id`, `product_id`, `product_version_id`),
                CONSTRAINT `fk.bundle_product.bundle_id` FOREIGN KEY (`bundle_id`)
                REFERENCES `as_bundle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `fk.bundle_product.product_id__product_version_id` FOREIGN KEY (`product_id`, `product_version_id`)
                REFERENCES `product` (`id`, `version_id`) ON DELETE CASCADE ON UPDATE CASCADE
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
        );

        $this->updateInheritance($connection, 'product', 'bundles');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
