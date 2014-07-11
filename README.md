Timestamps
==========

[![Build Status](https://travis-ci.org/harp-orm/timestamps.png?branch=master)](https://travis-ci.org/harp-orm/timestamps)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/timestamps/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/timestamps/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/timestamps/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/timestamps/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/timestamps/v/stable.png)](https://packagist.org/packages/harp-orm/timestamps)

Automatic createdAt and updatedAt properties

Usage
-----

Add the triats to the Repo and Model classes:

```php
use Harp\Harp\AbstractModel;
use Harp\Timestamps\TimestampsTrait;

class User extends AbstractModel
{
    use TimestampsTrait;

    public static function initialize($config)
    {
        // Adds events to populate the properties
        TimestampsTrait::initialize($config);
    }
}
```

__Database Table:__

```
┌─────────────────────────┐
│ Table: Category         │
├─────────────┬───────────┤
│ id          │ ingeter   │
│ name        │ string    │
│ createdAt*  │ timestamp │
│ updatedAt*  │ timestamp │
└─────────────┴───────────┘
* Required fields
```

Interface
---------

```php
echo $user->createdAt; // 2014-01-01 00:00:00
echo $user->updatedAt; // 2014-01-01 00:00:00

echo $user->getCreatedAt(); // DateTime object
$user->setCreatedAt(new DateTime());

echo $user->getUpdatedAt(); // DateTime object
$user->setUpdatedAt(new DateTime());
```

Testing
-------

You can set the "current date" that the the trait uses with the "TimestampsTrait::setCurrentDate($date)" method.

```php
TimestampsTrait::setCurrentDate('2014-03-01 10:00:00');

$user = new User();

echo $user->createdAt; // 2014-03-01 10:00:00
echo $user->updatedAt; // 2014-03-01 10:00:00
```

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
