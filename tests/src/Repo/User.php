<?php

namespace Harp\Timestamps\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Timestamps\Test\Model;
use Harp\Timestamps\TimestampsRepoTrait;
/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class User extends AbstractRepo
{
    use TimestampsRepoTrait {
        TimestampsRepoTrait::getCurrentDate as getTraitCurrentDate;
    }

    private static $instance;

    /**
     * @return User
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new User('Harp\Timestamps\Test\Model\User');
        }

        return self::$instance;
    }

    private $currentDate;

    public function setCurrentDate($date)
    {
        $this->currentDate = $date;

        return $this;
    }

    public function getCurrentDate()
    {
        return $this->currentDate ?: $this->getTraitCurrentDate();
    }

    public function initialize()
    {
        $this->initializeTimestamps();
    }
}
