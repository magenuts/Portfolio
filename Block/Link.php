<?php
/**
 * * @copyright Copyright (c) 2017-2021 Magenuts IT Solutions Pvt Ltd. All rights reserved.
 
 */
namespace Magenuts\Portfolio\Block;

use Magento\Framework\View\Element\Template;

/**
 * Main contact form block
 */
class Link extends \Magento\Framework\View\Element\Html\Link
{
    /**
     * @return string
     */
    public function getHref()
    {
        return $this->getUrl('portfolio');
    }
}
