<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dessert;
use App\Models\DessertAddon;
use App\Models\DessertTag;
use Illuminate\Http\Request;

class DessertController extends Controller
{
    public function index()
    {
        $countries = Country::select('id', 'name_en', 'country_iso_code', 'currency')->where('status', 1)->get();
        $desserts = Dessert::select('id', 'name_en', 'name_ar', 'price', 'country_iso_code')->where('status', 1)->get();
        $addons = DessertAddon::select('id', 'name_en', 'name_ar', 'country_iso_code', 'price')->where('status', 1)->get();
        $tags = DessertTag::select('id', 'name_en', 'name_ar')->where('status', 1)->get();
        $desserts_with_addons = Dessert::whereHas('desserts_addons')->where('status', 1)->get();
        $desserts_with_tags = Dessert::whereHas('desserts_tags')->where('status', 1)->get();
        return view('desserts.index', compact(['countries', 'desserts', 'addons', 'tags', 'desserts_with_addons', 'desserts_with_tags']));
    }

    // types: dish, addon, tag
    public function save_type($type, Request $request)
    {
        //return $request->country_iso_code;
        switch ($type) {
            case 'dessert':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'ingredients' => 'nullable|string',
                    'calories' => 'nullable|numeric',
                    'country_iso_code' => 'required|string|size:3|exists:countries,country_iso_code',
                    'price' => 'required|numeric',
                ]);

                try {
                    $dessert = Dessert::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'ingredients' => $request->ingredients,
                        'calories' => $request->calories,
                        'country_iso_code' => $request->country_iso_code,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Dessert saved successfully..'];
                    return redirect()->route('d.desserts')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving dessert data, try again..'];
                    return redirect()->back()->with($msg)->withInput();
                }

                break;

            case 'addon':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'calories' => 'nullable|numeric',
                    'country_iso_code' => 'required|string|size:3|exists:countries,country_iso_code',
                    'price' => 'required|numeric',
                ]);

                try {
                    $addon = DessertAddon::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'calories' => $request->calories,
                        'country_iso_code' => $request->country_iso_code,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Addon saved successfully..'];
                    return redirect()->route('d.desserts')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving addon data, try again..'];
                    return redirect()->back()->with($msg)->withInput();
                }

                break;

            case 'tag':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                ]);

                try {
                    $tag = DessertTag::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Tag saved successfully..'];
                    return redirect()->route('d.desserts')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving tag data, try again..'];
                    return redirect()->back()->with($msg)->withInput();
                }

                break;

            default:
                abort(404);
                break;
        }
    }

    // types: dish, addon, tag
    public function delete_type($type, $type_id)
    {
        switch ($type) {
            case 'dessert':
                $dish = Dessert::findOrFail($type_id);
                $dish->status = 0;
                $dish->save();
                $msg = ['customSuccess' => 'Dessert data deleted successfully..'];
                return redirect()->back()->with($msg);
                break;

            case 'addon':
                $addon = DessertAddon::findOrFail($type_id);
                $addon->status = 0;
                $addon->save();
                $msg = ['customSuccess' => 'Addon data deleted successfully..'];
                return redirect()->back()->with($msg);
                break;

            case 'tag':
                $tag = DessertTag::findOrFail($type_id);
                $tag->status = 0;
                $tag->save();
                $msg = ['customSuccess' => 'Tag data deleted successfully..'];
                return redirect()->back()->with($msg);
                break;

            default:
                abort(404);
                break;
        }
    }

    public function link_types(Request $request, $type)
    {

        switch ($type) {
            case 'addons':
                $dessert = Dessert::find($request->dessert_id);
                $dessert->desserts_addons()->sync($request->addon_ids);
                $msg = ['customSuccess' => 'Addons attached successfully'];
                return redirect()->back()->with($msg);
            case 'tag':
                $dessert = Dessert::find($request->dessert_id);
                $dessert->desserts_tags()->sync($request->tag_ids);
                $msg = ['customSuccess' => 'Tag attached successfully'];
                return redirect()->back()->with($msg);

            default:
                $msg = ['customError' => 'Wrong URL, try again later'];
                return redirect()->back()->with($msg);
        }
    }

    public function remove_type($type, $dessert_id, $type_id)
    {
        switch ($type) {
            case 'addons':
                $dessert = Dessert::find($dessert_id);
                $dessert->desserts_addons()->detach($type_id);
                $msg = ['customSuccess' => 'Addons removed successfully'];
                return redirect()->back()->with($msg);

            case 'tag':
                $dessert = Dessert::find($dessert_id);
                $dessert->desserts_tags()->detach($type_id);
                $msg = ['customSuccess' => 'Tag removed successfully'];
                return redirect()->back()->with($msg);

            default:
                $msg = ['customError' => 'Wrong URL, try again later'];
                return redirect()->back()->with($msg);
        }
    }
}
