<?php

namespace Harp\Timestamps\Test\Model;

use Harp\Harp\AbstractModel;
use Harp\Timestamps\Test\Repo;
use Harp\Timestamps\Model\TimestampsTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class User extends AbstractModel
{
    use TimestampsTrait;

    /**
     * @return Repo\User
     */
    public function getRepo()
    {
        return Repo\User::get();
    }

    public $id;
    public $name;
}
