<?php
/**
 * Copyright � 2015 Magento. All rights reserved.
 
 */

namespace Magenuts\Portfolio\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
		
		/**
         * Create table 'magenuts_portfolio_category'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenuts_portfolio_category')
        )->addColumn(
            'category_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Category Id'
        )->addColumn(
            'category_name',
            Table::TYPE_TEXT,
            255,
            [],
            'Category Name'
        )->addColumn(
            'identifier',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Identifier'
        );

        $installer->getConnection()->createTable($table);

        /**
         * Create table 'magenuts_portfolio_items'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenuts_portfolio_items')
        )->addColumn(
            'portfolio_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Portfolio Id'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [],
            'Name'
        )->addColumn(
            'client',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Client'
        )->addColumn(
            'identifier',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Identifier'
        )->addColumn(
            'thumbnail_image',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Thumbnail Image'
        )->addColumn(
            'base_image',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Base Image'
        )->addColumn(
            'services',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Services'
        )->addColumn(
            'skills',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Skills'
        )->addColumn(
            'project_url',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Project Url'
        )->addColumn(
            'client',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Client'
        )->addColumn(
            'description',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Description'
        )->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => 1],
            'Is Active'
        )->addColumn(
            'portfolio_date',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Portfolio Date'
        )->addColumn(
            'created_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Creation Time'
        )->addColumn(
            'update_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => true],
            'Update Time'
        );

        $installer->getConnection()->createTable($table);
		
		/**
         * Create table 'magenuts_portfolio_category_items'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenuts_portfolio_category_items')
        )->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Entity Id'
        )->addColumn(
            'category_id',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Category Id'
        )->addColumn(
            'portfolio_id',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Portfolio Id'
        );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
