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
    const XML_CONFIG_PATH_URL = 'whatsapp/settings/url';

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
     * Get url
     *
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->scopeInterface->getValue(self::XML_CONFIG_PATH_URL, ScopeInterface::SCOPE_STORE) ?: '';
    }
}
