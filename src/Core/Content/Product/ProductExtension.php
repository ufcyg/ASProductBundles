<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\Product;

use ASProductBundles\Core\Content\Bundle\BundleDefinition;
use ASProductBundles\Core\Content\BundleProduct\BundleProductDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new ManyToManyAssociationField(
                'bundles',
                BundleDefinition::class,
                BundleProductDefinition::class,
                'product_id',
                'bundle_id'
            ))->addFlags(new Inherited())
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}