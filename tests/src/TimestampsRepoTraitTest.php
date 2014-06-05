<?php

namespace Harp\Timestamps\Test;

use DateTime;
use Harp\Core\Repo\Event;
use Harp\Timestamps\Test\Model;
use Harp\Timestamps\Test\Repo;

/**
 * @coversDefaultClass Harp\Timestamps\TimestampsRepoTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class TimestampsRepoTraitTest extends AbstractTestCase
{
    /**
     * @covers ::initializeTimestamps
     */
    public function testInitializeTimestamps()
    {
        $repo = new Repo\User(__NAMESPACE__.'\Model\User');
        $repo->setCurrentDate('2014-02-20 22:10:00');

        $model = new Model\User();

        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::INSERT));
        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::SAVE));

        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::INSERT);
        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::SAVE);

        $this->assertEquals('2014-02-20 22:10:00', $model->createdAt);
        $this->assertEquals('2014-02-20 22:10:00', $model->updatedAt);
    }

    /**
     * @covers ::getCurrentDate
     */
    public function testGetCurrentDate()
    {
        $date = Repo\User::get()->getCurrentDate();

        $this->assertGreaterThanOrEqual(time(), strtotime($date));
    }
}
