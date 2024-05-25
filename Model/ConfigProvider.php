<?php

declare(strict_types=1);

namespace OH\WhatsappBtn\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ConfigProvider
 * @package OH\WhatsappBtn\Model
 */
class ConfigProvider
{
    /**
     * @var string
     */
    const XML_CONFIG_PATH_ENABLED = 'whatsapp/settings/enabled';

    /**
     * @var string
     */
    const XML_CONFIG_PATH_URL = 'whatsapp/settings/%s';

    /**
     * @var ScopeInterface
     */
    private $scopeInterface;

    public function __construct(
        ScopeConfigInterface $scopeInterface
    ) {
        $this->scopeInterface = $scopeInterface;
    }

    /**
     * Check if is enabled
     *
     * @return bool
     */
    public function isEnable(): ?bool
    {
        return $this->scopeInterface->isSetFlag(self::XML_CONFIG_PATH_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get config value by path
     *
     * @return mixed
     */
    public function getConfigValue($path)
    {
        $path = sprintf(self::XML_CONFIG_PATH_URL, $path);
        return $this->scopeInterface->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
