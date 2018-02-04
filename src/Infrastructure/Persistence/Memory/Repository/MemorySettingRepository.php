<?php

namespace App\Infrastructure\Persistence\Memory\Repository;

use App\Domain\Model\Aggregate\Settings;
use App\Domain\Model\Entity\Setting;
use App\Domain\Model\Repository\SettingRepository;
use App\Domain\ValueObject\Identity;
use App\Domain\ValueObject\IdentityInterface;

/**
 * Class MemorySettingRepository
 *
 * @package App\Infrastructure\Persistence\Memory\Repository
 */
final class MemorySettingRepository extends MemoryRepository implements SettingRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(): Settings
    {
        $fixtures = new Settings();
        foreach ($this->findFixtures() as $fixture) {
            $fixtures[] = $this->mapSetting($fixture);
        }

        return $fixtures;
    }

    /**
     * @param array $fixture
     *
     * @return \App\Domain\Model\Entity\Setting
     */
    protected function mapSetting(array $fixture): Setting
    {
        $setting = new Setting();
        $setting->setId(new Identity($fixture['id']))
          ->setKey($fixture['key'])
          ->setType($fixture['type'])
          ->setValue($fixture['value'])
          ->setCreatedAt(\DateTime::createFromFormat(self::DATE_FORMAT, $fixture['createdAt']))
          ->setUpdatedAt(\DateTime::createFromFormat(self::DATE_FORMAT, $fixture['updateAt']));

        return $setting;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchById(IdentityInterface $id): ?Setting
    {
        foreach ($this->findByName($id) as $fixture) {
            return $this->mapSetting($fixture);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByKey(string $key): Settings
    {
        $fixtures = new Settings();
        foreach ($this->findByContent("key: $key") as $fixture) {
            $fixtures[] = $this->mapSetting($fixture);
        }

        return $fixtures;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByType(string $type): Settings
    {
        $fixtures = new Settings();
        foreach ($this->findByContent("type: $type") as $fixture) {
            $fixtures->addSetting($this->mapSetting($fixture));
        }

        return $fixtures;
    }
}