<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

use Magento\SalesRule\Model\CouponFactory;
use Magento\SalesRule\Model\Spi\CouponResourceInterface;
use Magento\TestFramework\Helper\Bootstrap;

/** @var CouponResourceInterface $couponResource */
$couponResource = Bootstrap::getObjectManager()->get(CouponResourceInterface::class);
/** @var CouponFactory $couponFactory */
$couponFactory = Bootstrap::getObjectManager()->get(CouponFactory::class);

$coupon = $couponFactory->create();
$coupon->loadByCode('2?ds5!2d');

if ($coupon->getId()) {
    $coupon->setExpirationDate(null);
    $couponResource->save($coupon);
}
