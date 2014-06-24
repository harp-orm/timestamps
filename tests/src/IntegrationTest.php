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

        Model\User::save($new);

        $this->assertEquals('2014-02-20 22:10:00', $new->createdAt);
        $this->assertEquals('2014-02-20 22:10:00', $new->updatedAt);

        $model = Model\User::find(1);
        $model->name = 'other name';

        $this->assertEquals('2012-02-20 22:10:00', $model->updatedAt);

        Model\User::save($model);

        $this->assertEquals('2014-02-20 22:10:00', $model->updatedAt);

        $this->assertQueries([
            'INSERT INTO User (id, name, createdAt, updatedAt) VALUES (NULL, NULL, "2014-02-20 22:10:00", "2014-02-20 22:10:00")',
            'SELECT User.* FROM User WHERE (id = 1) LIMIT 1',
            'UPDATE User SET name = "other name", updatedAt = "2014-02-20 22:10:00" WHERE (id = 1)',
        ]);
    }
}
