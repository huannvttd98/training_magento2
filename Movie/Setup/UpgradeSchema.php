<?php
namespace Magenest\Movie\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.4') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();
//Install new database table magenest_movie
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie')
            )->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Subscription Id'
            )->addColumn(

                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null, [
                'nullable' => false
            ],
                'name movie'
            )->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'description movie'
            )->addColumn(
                'rating',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                64,
                ['nullable' => false],
                'Movie rating'
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'FK_magenest_director'
            )->setComment(
                'Cron Schedule'
            );
            $installer->getConnection()->createTable($table);


// insatall table magenest_director
            $table1 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_director')
            )->addColumn(
                'director_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Subscription Id'
            )->addColumn(

                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null, [
                'nullable' => false
            ],
                'director movie detail'
            )->setComment(
                'Cron director'
            );
            $installer->getConnection()->createTable($table1);


 // insatall table magenest_actor
            $table2 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_actor')
            )->addColumn(
                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'Subscription Id'
            )->addColumn(

                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null, [
                'nullable' => false
            ],
                'name actor'
            )->setComment(
                'Cron _ actor'
            );
            $installer->getConnection()->createTable($table2);


//  insatall table magenest_movie_actor
            $table3 = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie_actor')
            )->addColumn(
                'movie_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'FK_magenest_movie'
            )->addColumn(

                'actor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, [
                'nullable' => false

            ],
                'FK_magenest_actor
'
            )->setComment(
                'Cron_conmen'
            );
            $installer->getConnection()->createTable($table3);

            $installer->endSetup();
        }
    }
}
