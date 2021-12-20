<?php
namespace AHT\Pike\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

// class UpgradeData implements UpgradeDataInterface
// {
//     private $eavSetupFactory;

//     public function __construct(EavSetupFactory $eavSetupFactory)
//     {
//         $this->eavSetupFactory = $eavSetupFactory;
//     }

//     public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//     {
//         if (version_compare($context->getVersion(), '1.2.0', '<')) {
// 			$data = [
// 				'name'         => "Magento 2 Events",
// 				'post_content' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
// 			];
// 			$post = $this->_postFactory->create();
// 			$post->addData($data)->save();
// 		}

//     }
// }