<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MadePeople\WorkSample\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLE = 'worksample/general/enable';
    const XML_PATH_MULTIPLIER = 'worksample/general/multiplier';

    /**
     * @var ScopeConfigInterface
     */
    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnable()
    {
        return $this->config->getValue(self::XML_PATH_ENABLE);
    }

    public function getMultiplier()
    {
        return $this->config->getValue(self::XML_PATH_MULTIPLIER);
    }
}
