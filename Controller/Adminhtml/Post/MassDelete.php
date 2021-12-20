<?php
 
namespace AHT\Pike\Controller\Adminhtml\Post;
 
use Magento\Backend\App\Action;
use AHT\Pike\Model\ResourceModel\Post\CollectionFactory;
use AHT\Pike\Model\PostFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\Model\View\Result\RedirectFactory;
 
class MassDelete extends Action
{
    private $postFactory;
    private $filter;
    private $collectionFactory;
    private $resultRedirect;
 
    public function __construct(
        Action\Context $context,
        PostFactory $postFactory,
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirect = $redirectFactory;
    }
 
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deletePost = $this->postFactory->create()->load($item->getData('pike_id'));
            try {
                $deletePost->delete();
                $total++;
            } catch (LocalizedException $exception) {
                $err++;
            }
        }
 
        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }
 
        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->resultRedirect->create()->setPath('pike/post/index');
    }
}