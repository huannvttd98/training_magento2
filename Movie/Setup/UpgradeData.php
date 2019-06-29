<?php
namespace Magenest\Movie\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '2.0.5','<')) {
            $table = $setup->getTable('magenest_movie');
//    insert value table
            $setup->getConnection()
                ->insertForce($table, ['name' => 'Avartar', 'description' => 'Hay','rating'=>'8','director_id'=>'1']);
//    update value table
//            $setup->getConnection()
//                ->update($table, ['season' => 'winter'], 'greeting_id IN (1,2)');

//    insert value table magenest_director
            $table1 = $setup->getTable('magenest_director');
            $setup->getConnection()
                ->insertForce($table1, ['name' => 'Hinh anh dep noi dung hap dan ']);

//    insert value table magenest_actor
            $table2 = $setup->getTable('magenest_actor');
            $setup->getConnection()
                ->insertForce($table2, ['name' => 'Nguyen Van A']);

//   insert value tbale magenest_movie_actor
            $table3 = $setup->getTable('magenest_movie_actor');
            $setup->getConnection()->insertForce($table3,['movie_id'=>'1','actor_id'=>'1']);
        }
        $setup->endSetup();

    }


}
