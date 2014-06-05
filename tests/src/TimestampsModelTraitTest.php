<?php

namespace Harp\Timestamps\Test;

use DateTime;

/**
 * @coversDefaultClass Harp\Timestamps\TimestampsModelTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class TimestampsModelTraitTest extends AbstractTestCase
{
    /**
     * @covers ::getCreatedAt
     * @covers ::setCreatedAt
     */
    public function testCreatedAt()
    {
        $user = Repo\User::get()->find(1);

        $date = $user->getCreatedAt();

        $this->assertSame(1171963391, $date->getTimestamp());

        $user->setCreatedAt(new DateTime('2012-01-01'));

        $this->assertSame('2012-01-01 00:00:00', $user->createdAt);
    }

    /**
     * @covers ::getUpdatedAt
     * @covers ::setUpdatedAt
     */
    public function testUpdatedAt()
    {
        $user = Repo\User::get()->find(1);

        $date = $user->getUpdatedAt();

        $this->assertSame(1329768600, $date->getTimestamp());

        $user->setUpdatedAt(new DateTime('2012-01-01'));

        $this->assertSame('2012-01-01 00:00:00', $user->updatedAt);
    }
}
