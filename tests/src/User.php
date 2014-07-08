<?php

namespace Harp\Timestamps\Test;

use Harp\Harp\AbstractModel;
use Harp\Timestamps\TimestampsTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class User extends AbstractModel
{
    use TimestampsTrait;

    public static function initialize($repo)
    {
        TimestampsTrait::initialize($repo);
    }

    public $id;
    public $name;
}
