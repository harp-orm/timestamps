<?php

namespace Harp\Timestamps\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Timestamps\Test\Model;
use Harp\Timestamps\Repo\TimestampsTrait;
/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class User extends AbstractRepo
{
    use TimestampsTrait {
        TimestampsTrait::getCurrentDate as getTraitCurrentDate;
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
        $this
            ->setModelClass('Harp\Timestamps\Test\Model\User')
            ->initializeTimestamps();
    }
}
