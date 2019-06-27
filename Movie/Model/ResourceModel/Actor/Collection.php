<?php
namespace Magenest\Movie\Model\ResourceModel\Actor;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'actor_id';
    protected $_eventPrefix = 'magenest_actor';
    protected $_eventObject = 'post_collection';


    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Actor', 'Magenest\Movie\Model\ResourceModel\Actor');

    }
}

