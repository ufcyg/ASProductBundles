<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\Bundle;

use ASProductBundles\Core\Content\BundleProduct\BundleProductDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FloatField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\Test\Api\ApiVersioning\fixtures\Entities\v1\BundleEntity;

class BundleDefinition extends EntityDefinition
{
    
    public function getEntityName(): string
    {
        return 'as_bundle';
    }

    public function getCollectionClass(): string
    {
        return BundleCollection::class;
    }

    public function getEntityClass(): string
    {
        return BundleEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection(
            [
                (new IdField('id','id'))->addFlags(new Required(), new PrimaryKey()),
                (new StringField('discount_type','discountType'))->addFlags(new Required()),
                (new FloatField('discount','discount'))->addFlags(new Required()),
                new ManyToManyAssociationField('products', ProductDefinition::class, BundleProductDefinition::class, 'bundle_id', 'product_id'),
            ]
        );
    }
}
// "CREATE TABLE IF NOT EXISTS `as_bundle` (
//     `id` BINARY(16) NOT NULL,
//     `discount_type` VARCHAR(255) NOT NULL,
//     `discount` DOUBLE NOT NULL,
//     `created_at` DATETIME(3) NOT NULL,
//     `updated_at` DATETIME(3) NULL,
//     PRIMARY KEY (`id`)
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"