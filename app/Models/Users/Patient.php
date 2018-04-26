<?php

namespace App\Models\Users;

class Patient extends User
{
    protected $guarded = [];

    protected static $singleTableType = 'patient';

    protected static $persisted = [];
}