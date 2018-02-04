<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Model\Aggregate\Settings;
use App\Domain\Model\Repository\SettingRepository;
use Doctrine\ORM\EntityRepository;

/**
 * Class DoctrineSettingRepository
 *
 * @package App\Infrastructure\Persistence\Doctrine\Repository
 */
final class DoctrineSettingRepository extends EntityRepository implements SettingRepository
{

    /**
     * {@inheritdoc}
     */
    public function fetchAll(): Settings
    {
        return $this->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByKey(string $key): Settings
    {
        return $this->findOneBy(['key' => $key]);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchByType(string $type): Settings
    {
        return $this->findOneBy(['type' => $type]);
    }
}