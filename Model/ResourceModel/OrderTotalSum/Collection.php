<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Model\ResourceModel\OrderTotalSum;

use MadePeople\WorkSample\Model\OrderTotalSum;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(OrderTotalSum::class, \MadePeople\WorkSample\Model\ResourceModel\OrderTotalSum::class);
    }
}
