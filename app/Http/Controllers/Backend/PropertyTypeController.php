<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    public function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type', compact('types'));
    }

    public function AddType(){
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    public function EditType($id){
        $types = PropertyType::findorfail($id);
        return view('backend.type.edit_type', compact('types'));
    }

    public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findorfail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    public function DeleteType($id){
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // ------------- Amenities Menthods -------------  //
    public function AllAmenities(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }

    public function AddAmenities(){
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenities(Request $request){
        Amenities::insert([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
            'message' => 'Amenities Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    public function EditAmenities($id){
        $amenities = Amenities::findOrFail($id);
            return view('backend.amenities.edit_amenities', compact('amenities'));
    }

    public function UpdateAmenities(Request $request){

        $ame_id = $request->id;
        Amenities::findOrFail($ame_id)->update([
            'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
            'message' => 'Amenities Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenities($id){
        Amenities::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Amenities Deleted Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

}
