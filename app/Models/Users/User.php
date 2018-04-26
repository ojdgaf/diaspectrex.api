<?php

namespace App\Models\Users;

use App\Models\Diagnosing\Card;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SingleTableInheritanceTrait;

    protected $table = 'users';

    protected static $singleTableTypeField = 'type';

    protected static $singleTableSubclasses = [Patient::class, Employee::class];

    public function diagnosticCard()
    {
        return $this->hasOne(Card::class);
    }
}
