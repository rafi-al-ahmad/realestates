<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{

    public function addressValidationRules($rules = [])
    {
        return array_merge([
            'geodata' => ['required', 'array'],
            'country' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'address' => ['required', 'string'],
        ], $rules);
    }

    public function validateAddress($data)
    {
        return Validator::make($data, $this->addressValidationRules())->validate();
    }


    public function createOrUpdate($addressData, $model, $address_id = null)
    {
        $this->validateAddress($addressData);

        $address = Address::find($address_id);
        if (!$address) {
            $address = new Address();
        }
        $address->country = $addressData['country'];
        $address->address = $addressData['address'];
        $address->province = $addressData['province'];
        $address->city = $addressData['city'];
        $address->district = $addressData['district'];
        $address->postal_code = $addressData['postal_code'];
        $address->model_type = $model::class;
        $address->model_id = $model->id;

        if ($addressData['geodata'][0] != null) {
            $address->latitude = $addressData['geodata'][0]['geometry']['location']['lat'];
            $address->longitude = $addressData['geodata'][0]['geometry']['location']['lng'];
            $address->formatted_address = $addressData['geodata'][0]['formatted_address'];
            $address->geo = $addressData['geodata'];

            foreach ($addressData['geodata'][0]['address_components'] as $address_component) {

                if (in_array('administrative_area_level_1', $address_component['types'])) {
                    $address->administrative_1 = $address_component['long_name'];
                }
                if (in_array('administrative_area_level_2', $address_component['types'])) {
                    $address->administrative_2 = $address_component['long_name'];
                }
                if (in_array('administrative_area_level_3', $address_component['types'])) {
                    $address->administrative_3 = $address_component['long_name'];
                }
                if (in_array('administrative_area_level_4', $address_component['types'])) {
                    $address->administrative_4 = $address_component['long_name'];
                }

                if (in_array('administrative_area_level_5', $address_component['types'])) {
                    $address->administrative_5 = $address_component['long_name'];
                }

                if (in_array('route', $address_component['types'])) {
                    $address->route = $address_component['long_name'];
                }

                if (in_array('street_number', $address_component['types'])) {
                    $address->street_number = $address_component['long_name'];
                }
            }
        }

        $address->save();

        return $address;
    }


}
