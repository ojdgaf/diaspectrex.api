<?php
namespace App\Services;

use App\Models\Hospital;
use App\Models\Location\Address;
use App\Http\Resources\Hospital as HospitalResource;
use Illuminate\Support\Facades\DB;

/**
 * Service to create Hospital models with Address and Phone models inside.
 *
 * Class HospitalService
 * @package App\Services
 */
class HospitalService
{
    /**
     * Creates hospital, it's address and phones
     *
     * @param array $validatedData
     */
    public static function store(array $validatedData)
    {
        DB::beginTransaction();

        $addressId = null;
        if ($validatedData['address']){
            $address = Address::create($validatedData['address']);
            if (empty($address->id)){
                DB::rollBack();
                sendError('Server error occurs when trying to create hospital!',
                    [
                        'reason' => 'Unable to create address instance!'
                    ], 500);
            }
            $addressId = $address->id;
        }

        $hospital = Hospital::create([
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'],
            'address_id'  => $addressId
        ]);

        if (empty($hospital->id)){
            DB::rollBack();
            sendError('Server error occurs when trying to create hospital!',
                [
                    'reason' => 'Unable to create hospital instance!'
                ], 500);
        }
        if ($validatedData['phones']) {
            $success = PhoneService::storeMany($validatedData['phones'], $hospital->id);
            if (!$success){
                DB::rollBack();
                sendError('Server error occurs when trying to create hospital!',
                    [
                        'reason' => 'Unable to create phone(s) instance(s)!'
                    ], 500);
            }
        }

        DB::commit();
        sendResponse([
            'success' => true
        ], 'Hospital was successfully created!');
    }

    public static function update(array $validatedData, Hospital $hospital)
    {
        DB::beginTransaction();

        $addressId = null;
        if ($validatedData['address']){
            $address = Address::create($validatedData['address']);
            if (empty($address->id)){
                DB::rollBack();
                sendError('Server error occurs when trying to update hospital!',
                    [
                        'reason' => 'Unable to create address instance!'
                    ], 500);
            }
            $addressId = $address->id;
        }

        $success = $hospital->update([
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'],
            'address_id'  => $addressId
        ]);
        if (!$success){
            DB::rollBack();
            sendError('Server error occurs when trying to update hospital!',
                [
                    'reason' => 'Unable to update hospital\'s phone(s)!'
                ], 500);
        }

        if (count($hospital->phones) > 0){
            $success = $hospital->phones()->forceDelete();
            if (!$success){
                DB::rollBack();
                sendError('Server error occurs when trying to delete hospital!',
                    [
                        'reason' => 'Unable to delete hospital\'s phones!'
                    ], 500);
            }
        }

        $success = PhoneService::storeMany($validatedData['phones'], $hospital->id);
        if (!$success){
            DB::rollBack();
            sendError('Server error occurs when trying to create hospital!',
                [
                    'reason' => 'Unable to create phone(s) instance(s)!'
                ], 500);
        }

        DB::commit();
        sendResponse([
            'success' => true
        ], 'Hospital was successfully updated!');

    }

    public static function destroy(Hospital $hospital)
    {
        DB::beginTransaction();
        if (count($hospital->phones) > 0){
            $success = $hospital->phones()->forceDelete();
            if (!$success){
                DB::rollBack();
                sendError('Server error occurs when trying to delete hospital!',
                    [
                        'reason' => 'Unable to delete hospital\'s phones!'
                    ], 500);
            }
        }

        $success = $hospital->delete();
        if (!$success){
            DB::rollBack();
            sendError('Server error occurs when trying to delete hospital!',
                [
                    'reason' => 'Unable to delete hospital!'
                ], 500);
        }

        DB::commit();

        sendResponse([
            'success' => true,
            'hospitals' => HospitalResource::collection(Hospital::all())
        ], 'Hospital was successfully deleted!');
    }
}