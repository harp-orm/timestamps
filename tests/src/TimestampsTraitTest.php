<?php

namespace Harp\Timestamps\Test;

use DateTime;

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
