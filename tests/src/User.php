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
    const REPO = 'Harp\Timestamps\Test\UserRepo';

    use TimestampsTrait;

    public $id;
    public $name;
}
