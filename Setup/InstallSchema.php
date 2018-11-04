<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'madepeople_total_sum_multiplied'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('madepeople_total_sum_multiplied'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'order_id',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'Order Id'
            )
            ->addColumn(
                'multiplied_total_sum',
                Table::TYPE_DECIMAL,
                '12,4',
                [],
                'Order Multiplied total sum'
            )
            ->addIndex(
                $installer->getIdxName('total_sum_multiplied', ['order_id']),
                ['order_id']
            )->addForeignKey(
                $installer->getFkName('madepeople_total_sum_multiplied', 'order_id', 'sales_order', 'entity_id'),
                'order_id',
                $installer->getTable('sales_order'),
                'entity_id',
                Table::ACTION_CASCADE
            )
            ->setComment('Order Total Sum Multiplied Table');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
