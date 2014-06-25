<?php

namespace Harp\Timestamps;

use Harp\Harp\AbstractModel;
use Harp\Core\Repo\Event;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait TimestampsRepoTrait
{
    public function getCurrentDate()
    {
        return date('Y-m-d H:i:s');
    }

    /**
     * @param int                   $event
     * @param \Closure|object|array $callback
     */
    abstract public function addEventBefore($event, $callback);

    public function initializeTimestamps()
    {
        $self = $this;

        return $this
            ->addEventBefore(Event::SAVE, function ($model) use ($self) {
                $model->updatedAt = $self->getCurrentDate();
            })
            ->addEventBefore(Event::INSERT, function ($model) use ($self) {
                $model->createdAt = $self->getCurrentDate();
            });
    }
}
