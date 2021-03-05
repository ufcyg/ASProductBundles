<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\BundleProduct;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class BundleProductDefinition extends EntityDefinition
{
    
    public function getEntityName(): string
    {
        return 'as_bundle_product';
    }

    public function getCollectionClass(): string
    {
        return BundleProductCollection::class;
    }

    public function getEntityClass(): string
    {
        return BundleProductEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection(
            [
                (new FkField('bundle_id','bundleId', BundleDefinition::class))->addFlags(new PrimaryKey(), new Required()),
                (new FkField('product_id','productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
                (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
                new ManyToOneAssociationField('bundle', 'bundle_id', BundleDefinition::class),
                new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class),
                new CreatedAtField()
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