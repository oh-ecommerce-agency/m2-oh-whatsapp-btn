<?php

namespace OH\WhatsappBtn\ViewModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use OH\WhatsappBtn\Model\ConfigProvider;

/**
 * Class Button
 * @package OH\WhatsappBtn\ViewModel
 */
class Button extends DataObject implements ArgumentInterface
{
    /**
     * @var ConfigProvider
     */
    private ConfigProvider $configProvider;

    public function __construct(
        ConfigProvider $configProvider,
        array $data = []
    ) {
        parent::__construct($data);
        $this->configProvider = $configProvider;
    }

    public function getIsEnabled(): bool
    {
        return $this->configProvider->isEnable();
    }

    public function getUrl(): string
    {
        return $this->configProvider->getConfigValue('url');
    }
}
