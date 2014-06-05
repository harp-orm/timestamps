<?php

namespace Harp\Timestamps\Test;

use DateTime;
use Harp\Core\Repo\Event;

/**
 * @coversDefaultClass Harp\Timestamps\TimestampsModelTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class IntegrationTest extends AbstractTestCase
{
    /**
     * @coversNothing
     */
    public function testIntegration()
    {
        Repo\User::get()->setCurrentDate('2014-02-20 22:10:00');

        $new = new Model\User();

        $this->assertNull($new->createdAt);
        $this->assertNull($new->updatedAt);

        Repo\User::get()->save($new);

        $this->assertEquals('2014-02-20 22:10:00', $new->createdAt);
        $this->assertEquals('2014-02-20 22:10:00', $new->updatedAt);

        $model = Repo\User::get()->find(1);
        $model->name = 'other name';

        $this->assertEquals('2012-02-20 22:10:00', $model->updatedAt);

        Repo\User::get()->save($model);

        $this->assertEquals('2014-02-20 22:10:00', $model->updatedAt);
    }
}
