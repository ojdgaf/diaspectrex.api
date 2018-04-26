<?php

namespace App\Models\Users;

class Operator extends Employee
{
    protected static $singleTableType = 'operator';

    protected static $singleTableSubclasses = [Doctor::class];
}