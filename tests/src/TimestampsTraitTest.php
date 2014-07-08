<?php

namespace Harp\Timestamps\Test;

use DateTime;
use Harp\Core\Repo\Event;
use Harp\Timestamps\TimestampsTrait;

/**
 * @coversDefaultClass Harp\Timestamps\TimestampsTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class TimestampsTraitTest extends AbstractTestCase
{
    /**
     * @covers ::initialize
     */
    public function testInitialize()
    {
        $repo = User::getRepo();
        TimestampsTrait::setCurrentDate('2014-02-20 22:10:00');

        $model = new User();

        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::INSERT));
        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::SAVE));

        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::INSERT);
        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::SAVE);

        $this->assertEquals('2014-02-20 22:10:00', $model->createdAt);
        $this->assertEquals('2014-02-20 22:10:00', $model->updatedAt);
    }

    /**
     * @covers ::getCurrentDate
     * @covers ::setCurrentDate
     */
    public function testGetSetCurrentDate()
    {
        $date = TimestampsTrait::getCurrentDate();

        $this->assertGreaterThanOrEqual(time(), strtotime($date));

        TimestampsTrait::setCurrentDate('2014-02-20 22:10:00');

        $date = TimestampsTrait::getCurrentDate();

        $this->assertSame('2014-02-20 22:10:00', $date);
    }

    /**
     * @covers ::getCreatedAt
     * @covers ::setCreatedAt
     */
    public function testCreatedAt()
    {
        $user = User::find(1);

        $date = $user->getCreatedAt();

        $this->assertSame(1171970591, $date->getTimestamp());

        $user->setCreatedAt(new DateTime('2012-01-01'));

        $this->assertSame('2012-01-01 00:00:00', $user->createdAt);
    }

    /**
     * @covers ::getCreatedAt
     */
    public function testCreatedAtNull()
    {
        $user = User::find(1);

        $user->createdAt = null;

        $this->assertInstanceOf('DateTime', $user->getCreatedAt());
        $this->assertLessThan(new DateTime('2012-01-01'), $user->getCreatedAt());
    }

    /**
     * @covers ::getUpdatedAt
     * @covers ::setUpdatedAt
     */
    public function testUpdatedAt()
    {
        $user = User::find(1);

        $date = $user->getUpdatedAt();

        $this->assertSame(1329775800, $date->getTimestamp());

        $user->setUpdatedAt(new DateTime('2012-01-01'));

        $this->assertSame('2012-01-01 00:00:00', $user->updatedAt);
    }

    /**
     * @covers ::getUpdatedAt
     */
    public function testUpdatedAtNull()
    {
        $user = User::find(1);

        $user->updatedAt = null;

        $this->assertInstanceOf('DateTime', $user->getUpdatedAt());
        $this->assertLessThan(new DateTime('2012-01-01'), $user->getUpdatedAt());
    }

}
