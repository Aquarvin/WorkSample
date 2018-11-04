<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Model;

use MadePeople\WorkSample\Api\Data\OrderTotalSumInterface;
use Magento\Framework\Model\AbstractModel;

class OrderTotalSum extends AbstractModel implements OrderTotalSumInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\OrderTotalSum::class);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * @inheritdoc
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * @inheritdoc
     */
    public function getMultipliedTotalSum()
    {
        return $this->getData(self::MULTIPLIED_TOTAL_SUM);
    }

    /**
     * @inheritdoc
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * @inheritdoc
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * @inheritdoc
     */
    public function setMultipliedTotalSum($multipliedTotalSum)
    {
        return $this->setData(self::MULTIPLIED_TOTAL_SUM, $multipliedTotalSum);
    }
}
