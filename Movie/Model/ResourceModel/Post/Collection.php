<?php
namespace Magenest\Movie\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'movie_id';
    protected $_eventPrefix = 'magenest_movie';
    protected $_eventObject = 'post_collection';


    protected function _construct()
    {
        $this->_init('Magenest\Movie\Model\Post', 'Magenest\Movie\Model\ResourceModel\Post');

    }

     public function getjointable()
    {
        $movieTable = $this->_resource->getTable('magenest_movie');
        $directorytable = $this->_resource->getTable('magenest_director');
        $magenest_movie_actor = $this->_resource->getTable('magenest_movie_actor');
        $actor =$this->_resource->getTable('magenest_actor');
        $collection = $this->getSelect()
            ->joinLeft(['di' => $directorytable],"main_table.director_id = di.director_id",['director_name'=> 'di.name'])
            ->joinLeft(['ma' => $magenest_movie_actor],"main_table.movie_id = ma.movie_id")
            ->joinLeft(['at' => $actor], "ma.actor_id = at.actor_id",['actor_name' => 'at.name']);
        return $this;
    }

    public function getactor()
    {

       $actor =$this->_resource->getTable('magenest_actor');

        return $actor;
    }



}

