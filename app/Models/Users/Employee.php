<?php

namespace App\Models\Users;

class Employee extends User
{
    protected static $singleTableType = 'employee';

    protected static $singleTableSubclasses = [Operator::class];

    protected static $persisted = [
        'hired_at', 'fired_at', 'is_present', 'about'
    ];
}