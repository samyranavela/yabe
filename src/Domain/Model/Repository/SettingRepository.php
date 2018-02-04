<?php

namespace App\Domain\Model\Repository;

use App\Domain\Model\Aggregate\Settings;

/**
 * Interface SettingRepository
 *
 * @package App\Domain\Model\Repository
 */
interface SettingRepository
{

    /**
     * @return \App\Domain\Model\Aggregate\Settings
     */
    public function fetchAll(): Settings;

    /**
     * @param string $key
     *
     * @return \App\Domain\Model\Aggregate\Settings
     */
    public function fetchByKey(string $key): Settings;

    /**
     * @param string $type
     *
     * @return \App\Domain\Model\Aggregate\Settings
     */
    public function fetchByType(string $type): Settings;
}
