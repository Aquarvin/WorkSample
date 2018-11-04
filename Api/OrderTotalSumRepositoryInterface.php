<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface OrderTotalSumRepositoryInterface
{
    /**
     * Create or update an entity.
     *
     * @param Data\OrderTotalSumInterface $entity
     *
     * @return Data\OrderTotalSumInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\OrderTotalSumInterface $entity);

    /**
     * Get entity by ID.
     *
     * @param int $entityId
     *
     * @return Data\OrderTotalSumInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($entityId);

    /**
     * Delete entity.
     *
     * @param Data\OrderTotalSumInterface $orderTotalSumEntity
     *
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\OrderTotalSumInterface $orderTotalSumEntity);

    /**
     * Delete entity by ID.
     *
     * @param int $entityId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($entityId);
    
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
