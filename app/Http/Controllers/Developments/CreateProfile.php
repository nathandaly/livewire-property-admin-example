<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use App\Models\Eloquent\Location;
use App\Models\Eloquent\LocationPostcode;
use App\Models\Eloquent\Property;
use App\Models\Eloquent\PropertyAdvert;
use App\Models\Eloquent\PropertyProfile;
use Illuminate\Http\Request;

class CreateProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Development  $development
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Development $development, Request $request)
    {
        if ($request->request->has('address_1')) {
            // Create the Profile and redirect to edit screen
            $advert = PropertyAdvert::find($request->get('advert_id'));
            abort_if($advert === null, 404);

            $property = $this->storeProperty($request);
            $profile = $this->storeProfile($property, $development, $advert);

            return redirect(route('development.profiles.edit', ['development' => $development, 'profile' => $profile]))
                ->with('status', 'Profile has been created');
        }

        if ($request->has('advert_id')) {
            // Show Advert highlights and Address Confirmation
            $advert = PropertyAdvert::find($request->get('advert_id'));
            abort_if($advert === null, 404);

            return view('developments.create-profile.confirm-address', compact('development', 'advert'));
        }

        // Pick from active adverts
        $adverts = $development->properties;

        return view('developments.create-profile.advert-select', compact('development', 'adverts'));
    }

    private function storeProperty(Request $request): Property
    {
        $postcode = preg_replace('/[^A-Za-z0-9 ]/', '', $request->input('postcode'));

        $outcode = strtoupper(trim(substr($postcode, 0, -3)));
        $incode = strtoupper(substr($postcode, -3));

        $lookup = LocationPostcode::where('outcode', $outcode)->where('incode', $incode)->first();

        $propertyModel = new Property;
        $propertyModel->postcode = sprintf('%s %s', $outcode, $incode);
        $propertyModel->outcode = $outcode;
        $propertyModel->incode = $incode;
        $propertyModel->latitude = $lookup->latitude ?? null;
        $propertyModel->longitude = $lookup->longitude ?? null;
        $propertyModel->save();

        $displayAddress = collect($request->only(['address_1', 'address_2', 'address_3', 'address_4', 'town']))->filter()->implode(', ');

        /*
         * Property Location (from PAF data)
         */
        if ($propertyModel->location == null) {
            $locationData = [
                'address_1'        => $request->get('address_1'),
                'address_2'        => $request->get('address_2'),
                'address_3'        => $request->get('address_3'),
                'address_4'        => $request->get('address_4'),
                'town'             => $request->get('town'),
                'postcode_outcode' => $outcode,
                'postcode_incode'  => $incode,
                'display_address'  => $displayAddress,
                'latitude'         => $lookup->latitude,
                'longitude'        => $lookup->longitude,
            ];

            $propertyModel->location()->save(new Location($locationData));
        }

        return $propertyModel->fresh();
    }

    private function storeProfile(Property $propertyModel, Development $development, PropertyAdvert $advert)
    {
        /** @var PropertyProfile $propertyProfile */
        $propertyProfile = PropertyProfile::firstOrNew([
            'property_id' => $propertyModel->id,
            'owner_type'  => $development->getMorphClass(),
            'owner_id'    => $development->id,
        ]);

        // Store beds, baths, receptions
        $propertyProfile->bedrooms = $advert->bedrooms;
        $propertyProfile->bathrooms = $advert->bathrooms;
        $propertyProfile->reception_rooms = $advert->reception_rooms;
        $propertyProfile->summary = $advert->summary;
        $propertyProfile->description = $advert->description;
        $propertyProfile->property_type = $advert->property_type;
        $propertyProfile->feature_points = $advert->feature_points;
        $propertyProfile->parking = $advert->parking;
        $propertyProfile->outside_space = $advert->outside_space;
        $propertyProfile->year_built = $advert->year_built;
        $propertyProfile->save();

        return $propertyProfile->fresh();
    }
}
