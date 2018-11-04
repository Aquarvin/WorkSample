<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Observer;

use MadePeople\WorkSample\Api\OrderTotalSumRepositoryInterface;
use MadePeople\WorkSample\Model\Config;
use MadePeople\WorkSample\Model\OrderTotalSumFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class MultiplyTotalSum implements ObserverInterface
{
    /**
     * @var Config
     */
    private $config;
    /**
     * @var OrderTotalSumFactory
     */
    private $orderTotalSumFactory;
    /**
     * @var OrderTotalSumRepositoryInterface
     */
    private $orderTotalSumRepository;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct(
        Config $config,
        OrderTotalSumFactory $orderTotalSumFactory,
        OrderTotalSumRepositoryInterface $orderTotalSumRepository,
        LoggerInterface $logger
    ) {
        $this->config = $config;
        $this->orderTotalSumFactory = $orderTotalSumFactory;
        $this->orderTotalSumRepository = $orderTotalSumRepository;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        if (!$this->config->isEnable()) {
            return $this;
        }

        $order = $observer->getEvent()->getInvoice()->getOrder();
        if ($order->getBaseTotalDue() == 0) {
            $sumMultiplied = $order->getBaseGrandTotal() * $this->config->getMultiplier();

            /** @var \MadePeople\WorkSample\Api\Data\OrderTotalSumInterface $model */
            $model = $this->orderTotalSumFactory->create();
            $model->setMultipliedTotalSum($sumMultiplied);
            $model->setOrderId($order->getId());
            try {
                $this->orderTotalSumRepository->save($model);
            } catch (LocalizedException $e) {
                $this->logger->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->logger->addError($e->getMessage());
            }
        }

        return $this;
    }
}