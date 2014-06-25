<?php

namespace Harp\Timestamps\Test;

use Harp\Harp\AbstractRepo;
use Harp\Timestamps\TimestampsRepoTrait;
/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class UserRepo extends AbstractRepo
{
    use TimestampsRepoTrait {
        TimestampsRepoTrait::getCurrentDate as getTraitCurrentDate;
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
            ->setModelClass('Harp\Timestamps\Test\User')
            ->initializeTimestamps();
    }
}
