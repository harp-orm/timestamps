Timestamps
==========

[![Build Status](https://travis-ci.org/harp-orm/timestamps.png?branch=master)](https://travis-ci.org/harp-orm/timestamps)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/timestamps/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/timestamps/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/timestamps/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/timestamps/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/timestamps/v/stable.png)](https://packagist.org/packages/harp-orm/timestamps)

Automatic createdAt and updatedAt properties

Usage
-----

You must add __createdAt__ and __updatedAt__ DATETIME / TIMESTAMP fields to your database table.

Then just add the triats to the Repo and Model classes:

```php
use Harp\Harp\AbstractModel;
use Harp\Timestamps\Model\TimestampsTrait;

class User extends AbstractModel
{
    use TimestampsModelTrait;

    // ...
}
```

```php
use Harp\Harp\AbstractRepo;
use Harp\Timestamps\Repo\TimestampsTrait;

class User extends AbstractRepo
{
    use TimestampsRepoTrait;

    function initialize()
    {
        // Adds events to populate the properties
        $this->initializeTimestamps();
    }
}
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

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
