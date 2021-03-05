<?php declare(strict_types=1);

namespace ASProductBundles\Core\Content\Bundle;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class BundleEntity extends Entity
{
    use EntityIdTrait;
    
    /** @var string */
    protected $discountType;

    /** @var float */
    protected $discount;

    /** Get the value of discountType */ 
    public function getDiscountType() { return $this->discountType; }

    /** Set the value of discountType @return  self */ 
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;

        return $this;
    }

    /** Get the value of discount */ 
    public function getDiscount() { return $this->discount; }

    /** Set the value of discount @return  self */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }
}