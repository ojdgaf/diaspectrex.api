<?php

namespace App\Models\Users;

class Doctor extends Operator
{
    protected static $singleTableType = 'doctor';

    protected static $persisted = ['degree'];
}