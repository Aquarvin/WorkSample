<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Model;

use MadePeople\WorkSample\Api\Data\OrderTotalSumInterface;
use MadePeople\WorkSample\Api\Data\OrderTotalSumSearchResultsInterfaceFactory;
use MadePeople\WorkSample\Api\OrderTotalSumRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use MadePeople\WorkSample\Model\ResourceModel\OrderTotalSum as OrderTotalSumResource;
use MadePeople\WorkSample\Model\OrderTotalSumFactory;
use MadePeople\WorkSample\Model\ResourceModel\OrderTotalSum\CollectionFactory as OrderTotalSumCollectionFactory;

class OrderTotalSumRepository implements OrderTotalSumRepositoryInterface
{
    /**
     * @var OrderTotalSumResource
     */
    private $resource;

    /**
     * @var OrderTotalSumFactory
     */
    private $orderTotalSumFactory;

    /**
     * @var OrderTotalSumCollectionFactory
     */
    private $orderTotalSumCollectionFactory;

    /**
     * @var OrderTotalSumSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param OrderTotalSumResource $resource
     * @param OrderTotalSumFactory $orderTotalSumFactory
     * @param OrderTotalSumCollectionFactory $orderTotalSumCollectionFactory
     * @param OrderTotalSumSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        OrderTotalSumResource $resource,
        OrderTotalSumFactory $orderTotalSumFactory,
        OrderTotalSumCollectionFactory $orderTotalSumCollectionFactory,
        OrderTotalSumSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->orderTotalSumFactory = $orderTotalSumFactory;
        $this->orderTotalSumCollectionFactory = $orderTotalSumCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save data
     *
     * @param \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface $orderTotalSum
     * @return OrderTotalSum
     * @throws CouldNotSaveException
     */
    public function save(OrderTotalSumInterface $orderTotalSum)
    {
        try {
            $this->resource->save($orderTotalSum);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the entity: %1', $exception->getMessage()),
                $exception
            );
        }
        return $orderTotalSum;
    }

    /**
     * Load entity data by given post Identity
     *
     * @param string $entityId
     * @return OrderTotalSum
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($entityId)
    {
        $orderTotalSum = $this->orderTotalSumFactory->create();
        $this->resource->load($orderTotalSum, $entityId);
        if (!$orderTotalSum->getId()) {
            throw new NoSuchEntityException(__('OrderTotalSum with id "%1" does not exist.', $entityId));
        }
        return $orderTotalSum;
    }

    /**
     * Load Entity data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \MadePeople\WorkSample\Api\Data\OrderTotalSumSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        /** @var \MadePeople\WorkSample\Model\ResourceModel\OrderTotalSum\Collection $collection */
        $collection = $this->orderTotalSumCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var \MadePeople\WorkSample\Api\Data\OrderTotalSumSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete post
     *
     * @param \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface $orderTotalSum
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(OrderTotalSumInterface $orderTotalSum)
    {
        try {
            $this->resource->delete($orderTotalSum);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the entity: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete entity by given Identity
     *
     * @param string $orderTotalSumId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($orderTotalSumId)
    {
        return $this->delete($this->getById($orderTotalSumId));
    }
}
