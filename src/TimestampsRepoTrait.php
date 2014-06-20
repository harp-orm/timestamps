<?php

namespace Harp\Timestamps;

use Harp\Harp\AbstractModel;

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

    abstract public function addEventBeforeSave($callback);

    abstract public function addEventBeforeInsert($callback);

    public function initializeTimestamps()
    {
        $self = $this;

        return $this
            ->addEventBeforeSave(function (AbstractModel $model) use ($self) {
                $model->updatedAt = $self->getCurrentDate();
            })
            ->addEventBeforeInsert(function (AbstractModel $model) use ($self) {
                $model->createdAt = $self->getCurrentDate();
            });
    }
}
