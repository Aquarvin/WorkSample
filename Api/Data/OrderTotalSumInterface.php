<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Api\Data;

interface OrderTotalSumInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'post_id';
    const ORDER_ID = 'order_id';
    const MULTIPLIED_TOTAL_SUM = 'multiplied_total_sum';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Order ID
     *
     * @return string
     */
    public function getOrderId();

    /**
     * Get multiplied total sum
     *
     * @return string|null
     */
    public function getMultipliedTotalSum();

    /**
     * Set ID
     *
     * @param int $id
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface
     */
    public function setId($id);

    /**
     * Set order ID
     *
     * @param string $orderId
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface
     */
    public function setOrderId($orderId);

    /**
     * Set multiplied total sum
     *
     * @param string $multipliedTotalSum
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface
     */
    public function setMultipliedTotalSum($multipliedTotalSum);
}
