<?php
namespace App\Observers;

use App\Models\Phone;

/**
 * Observes the events on Phone model.
 *
 * Class PhoneObserver
 * @package App\Observers
 */
class PhoneObserver
{
    /**
     * Listen to the Phone creating event.
     *
     * @param Phone $phone
     * @return void
     */
    public function creating(Phone $phone)
    {
        if (strpos($phone->phoneable_type, "App\\Models\\") == false)
            $phone->phoneable_type = "App\\Models\\" . $phone->phoneable_type;
    }
}