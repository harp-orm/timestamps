<?php

namespace Harp\Timestamps;

use DateTime;
use Harp\Harp\Config;
use Harp\Harp\Repo\Event;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait TimestampsTrait
{
    private static $currentDate;

    public static function setCurrentDate($date)
    {
        self::$currentDate = $date;
    }

    public static function getCurrentDate()
    {
        return self::$currentDate ?: date('Y-m-d H:i:s');
    }

    public static function initialize(Config $repo)
    {
        $repo
            ->addEventBefore(Event::SAVE, function ($model) {
                $model->updatedAt = self::getCurrentDate();
            })
            ->addEventBefore(Event::INSERT, function ($model) {
                $model->createdAt = self::getCurrentDate();
            });
    }

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return new DateTime($this->createdAt ?: '0000-01-01');
    }

    /**
     * @param DateTime $time
     */
    public function setCreatedAt(DateTime $time)
    {
        $this->createdAt = $time->format('Y-m-d H:i:s');

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return new DateTime($this->updatedAt ?: '0000-01-01');
    }

    /**
     * @param DateTime $time
     */
    public function setUpdatedAt(DateTime $time)
    {
        $this->updatedAt = $time->format('Y-m-d H:i:s');

        return $this;
    }
}
