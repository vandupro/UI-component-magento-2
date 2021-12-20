<?php
 
namespace AHT\Pike\Controller\Adminhtml\Post;
 
use AHT\Pike\Model\PostFactory;
use Magento\Backend\App\Action;
 
/**
 * Class Save
 * @package AHT\Pike\Controller\Adminhtml\Post
 */
class Save extends Action
{
    /**
     * @var PostFactory
     */
    private $postFactory;
 
    /**
     * Save constructor.
     * @param Action\Context $context
     * @param PostFactory $postFactory
     */
    public function __construct(
        Action\Context $context,
        PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
    }
 
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['pike_id']) ? $data['pike_id'] : null;
 
        $newData = [
            'name' => $data['name'],
            'content' => $data['content'],
        ];
 
        $post = $this->postFactory->create();
 
        if ($id) {
            $post->load($id);
        }
        try {
            $post->addData($newData);
            $post->save();
            $this->messageManager->addSuccessMessage(__('You saved the post.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
 
        return $this->resultRedirectFactory->create()->setPath('pike/post/index');
    }
}