<?php

namespace App\Domain\Model\Aggregate;

use App\Domain\Model\Entity\Setting;

/**
 * Class Settings
 *
 * @package App\Domain\Model\Aggregate
 */
class Settings
{

    /**
     * @var Setting[]
     */
    private $settings;

    /**
     * @param \App\Domain\Model\Entity\Setting $setting
     *
     * @return $this
     */
    public function addSetting(Setting $setting): Settings
    {
        $this->settings[$setting->getKey()] = $setting;

        return $this;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return string
     */
    public function __call($name, $arguments)
    {
        return $this->getSetting($name);
    }

    /**
     * @param string $key
     *
     * @return \App\Domain\Model\Entity\Setting
     */
    public function getSetting(string $key): Setting
    {
        if (array_key_exists($key, $this->settings)) {
            return $this->settings[$key];
        }

        throw new \InvalidArgumentException(sprintf('"%s" key not fount in settings', $key));
    }

    /**
     * @param Setting[] $settings
     *
     * @return $this
     */
    public function addSettings(array $settings)
    {
        foreach ($settings as $setting) {
            $this->settings[$setting->getKey()] = $setting;
        }

        return $this;
    }

    /**
     * @return Setting[]
     */
    public function getSettings(): array
    {
        return $this->settings;
    }
}