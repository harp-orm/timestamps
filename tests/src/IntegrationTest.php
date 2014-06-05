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
        $model = new Model\User();

        $this->assertNull($model->createdAt);
        $this->assertNull($model->updatedAt);

        Repo\User::get()->save($model);

        $this->assertNotNull($model->createdAt);
        $this->assertNotNull($model->updatedAt);

        $model = Repo\User::get()->find(1);
        $model->name = 'other name';

        $updatedAt = $model->getUpdatedAt();

        Repo\User::get()->save($model);

        $this->assertTrue($model->getUpdatedAt() > $updatedAt);
    }
}
