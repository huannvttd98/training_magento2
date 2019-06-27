<?php
namespace Magenest\Movie\Block;
use function GuzzleHttp\choose_handler;
use Magento\Framework\View\Element\Template;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\Strings\EchoedStringsSniff;

class Index extends Template
{
    protected $_template = "Magenest_Movie::index.phtml";
    protected $_PostFactory;
    protected $_collectionFactory;
    protected $_postFactory;
    protected $actor;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magenest\Movie\Model\PostFactory $postFactory,
        \Magenest\Movie\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        \Magenest\Movie\Model\ResourceModel\Actor\CollectionFactory $actor

    )
    {
        $this->actor = $actor;
        $this->_collectionFactory = $collectionFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function getLandingsUrl()
    {
        return $this->getUrl('');
    }

    public function getRedirectUrl()
    {
        return $this->getUrl('Movie/index/index');
    }


    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        return $post->getCollection();

    }

    public function getdatajoin()
    {
        $data = $this->_collectionFactory->create()->getjointable();
        return $data;

    }

    public function getdataactor()
    {
        return $this->_collectionFactory->create()->getactor();
    }

    public function getactor()
    {
        $actor = $this->actor->create()->getItems();
        return $actor;
    }


}