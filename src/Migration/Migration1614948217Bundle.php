<?php declare(strict_types=1);

namespace ASProductBundles\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1614948217Bundle extends MigrationStep
{
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
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
