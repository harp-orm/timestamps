<?php

namespace Harp\Timestamps;

use DateTime;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait TimestampsModelTrait
{
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
        $this->updatedAt = $time->format('Y-m-d H:i:s');;

        return $this;
    }
}
