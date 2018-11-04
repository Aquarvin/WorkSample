<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface OrderTotalSumSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get entities list.
     *
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface[]
     */
    public function getItems();

    /**
     * Set entities list.
     *
     * @param \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
