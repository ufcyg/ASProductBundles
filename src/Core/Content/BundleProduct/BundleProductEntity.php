<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\BundleProduct;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class BundleProductEntity extends Entity
{
    use EntityIdTrait;
    
    /** @var string */
    protected $discountType;

    /** @var float */
    protected $discount;

    /** Get the value of discountType */ 
    public function getDiscountType(): string { return $this->discountType; }

    /** Set the value of discountType @return  self */ 
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;

        return $this;
    }

    /** Get the value of discount */ 
    public function getDiscount(): float { return $this->discount; }

    /** Set the value of discount @return  self */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }
}