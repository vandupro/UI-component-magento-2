<?php
namespace AHT\Pike\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'pike_id';
    protected $_eventPrefix = 'aht_pike_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Pike\Model\Post', 'AHT\Pike\Model\ResourceModel\Post');
    }
}
