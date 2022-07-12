<?php

namespace App\Http\Controllers\Developments;

use App\Http\Controllers\Controller;
use App\Models\Eloquent\Development;
use App\Models\Eloquent\PropertyProfile;
use App\Models\Eloquent\PropertyProfileArea;
use App\Models\Eloquent\PropertyProfileItem;
use Illuminate\Http\Request;

class ProfileInventory extends Controller
{
    public function __invoke(Development $development, PropertyProfile $profile, Request $request)
    {
        if ($request->request->has('action')) {
            switch ($request->request->get('action')) {
                case 'create_area':
                    $data = $request->validate([
                        'area_name' => ['required', 'string'],
                    ]);
                    $this->createNewArea($profile, $data);

                    return redirect(route('development.profile-inventory', compact('development', 'profile')))
                        ->with('status', 'Area was created');

                case 'update_area':
                    $data = $request->validate([
                        'area_dimensions'   => ['nullable', 'string'],
                        'ceiling_height'    => ['nullable', 'string'],
                        'door_frame'        => ['nullable', 'string'],
                        'window_frame'      => ['nullable', 'string'],
                        'number_of_sockets' => ['nullable', 'string'],
                        'area_id'           => ['int', 'exists:property_profile_areas,id'],
                    ]);
                    $this->updateArea($data);

                    return redirect(route('development.profile-inventory', compact('development', 'profile')))
                        ->with('status', 'Area measurements were updated');

                case 'create_item':
                    $data = $request->validate([
                        'item_name'   => ['required', 'string'],
                        'item_type'   => ['nullable', 'string'],
                        'item_make'   => ['nullable', 'string'],
                        'item_style'  => ['nullable', 'string'],
                        'item_colour' => ['nullable', 'string'],
                        'area_id'     => ['int', 'exists:property_profile_areas,id'],
                    ]);
                    $this->createNewItem($data);

                    return redirect(route('development.profile-inventory', compact('development', 'profile')))
                        ->with('status', 'Item was added');

                default:
                    return redirect(route('development.profile-inventory', compact('development', 'profile')))
                        ->with('error', 'Action not recognised');
            }
        }

        // Not processing an action, show the Inventory
        $areas = $profile->areas;

        return view('developments.profile-inventory.index', compact('development', 'profile', 'areas'));
    }

    /**
     * @param  PropertyProfile  $profile
     * @param  array  $data
     * @return bool
     */
    private function createNewArea(PropertyProfile $profile, $data)
    {
        $area = new PropertyProfileArea;
        $area->area_name = $data['area_name'];
        $area->property_profile_id = $profile->id;

        return $area->save();
    }

    private function createNewItem($data)
    {
        $item = new PropertyProfileItem;
        $item->item_name = $data['item_name'];
        $item->item_type = $data['item_type'];
        $item->item_make = $data['item_make'];
        $item->item_style = $data['item_style'];
        $item->item_colour = $data['item_colour'];
        $item->property_profile_area_id = $data['area_id'];

        return $item->save();
    }

    private function updateArea($data)
    {
        $area = PropertyProfileArea::findOrFail($data['area_id']);
        $area->area_dimensions = $data['area_dimensions'];
        $area->ceiling_height = $data['ceiling_height'];
        $area->door_frame = $data['door_frame'];
        $area->window_frame = $data['window_frame'];
        $area->number_of_sockets = $data['number_of_sockets'];

        return $area->save();
    }
}
