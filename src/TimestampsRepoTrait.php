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
    public function initializeTimestamps()
    {
        $this
            ->addEventBeforeSave(function (AbstractModel $model) {
                $model->updatedAt = date('Y-m-d H:i:s');
            })
            ->addEventBeforeInsert(function (AbstractModel $model) {
                $model->createdAt = date('Y-m-d H:i:s');
            });
    }
}
