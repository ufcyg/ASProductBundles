<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\BundleProduct;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void              add(BundleProductCollection $entity)
 * @method void              set(string $key, BundleProductCollection $entity)
 * @method BundleProductCollection[]    getIterator()
 * @method BundleProductCollection[]    getElements()
 * @method BundleProductCollection|null get(string $key)
 * @method BundleProductCollection|null first()
 * @method BundleProductCollection|null last()
 */
class BundleProductCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return BundleProductEntity::class;
    }
}