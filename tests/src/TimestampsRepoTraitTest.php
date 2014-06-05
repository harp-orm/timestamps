<?php

namespace Harp\Timestamps\Test;

use DateTime;
use Harp\Core\Repo\Event;

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

        $model = new Model\User();

        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::INSERT));
        $this->assertTrue($repo->getEventListeners()->hasBeforeEvent(Event::SAVE));

        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::INSERT);
        $repo->getEventListeners()->dispatchBeforeEvent($model, Event::SAVE);

        $this->assertNotNull($model->createdAt);
        $this->assertNotNull($model->updatedAt);
    }
}
