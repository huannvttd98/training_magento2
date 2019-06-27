<?php
namespace Magenest\Movie\Model;
class Actor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
        const CACHE_TAG = 'magenest_actor';

    protected $_cacheTag = 'magenest_actor';

    protected $_eventPrefix = 'magenest_actor';

    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\ResourceModel\Actor');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
