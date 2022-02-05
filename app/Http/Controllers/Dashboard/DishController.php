<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\DishAddon;
use App\Models\DishTag;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $countries = Country::select('id', 'name_en', 'country_iso_code', 'currency')->where('status', 1)->get();
        $dishes = Dish::select('id', 'name_en', 'name_ar', 'price', 'country_iso_code')->where('status', 1)->get();
        $addons = DishAddon::select('id', 'name_en', 'name_ar', 'country_iso_code', 'price')->where('status', 1)->get();
        $tags = DishTag::select('id', 'name_en', 'name_ar')->where('status', 1)->get();

        $dishes_with_addons = Dish::whereHas('dishes_addons')->with('dishes_addons')->orderBy('name_en')->get();
        $dishes_with_tags = Dish::whereHas('dishes_tags')->with('dishes_tags')->orderBy('name_en')->get();

        return view('dishes.index', compact(['countries', 'dishes', 'addons', 'tags', 'dishes_with_addons', 'dishes_with_tags']));
    }

    // types: dish, addon, tag
    public function save_type($type, Request $request)
    {
        //return $request->country_iso_code;
        switch ($type) {
            case 'dish':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'ingredients' => 'nullable|string',
                    'calories' => 'nullable|numeric',
                    'country_iso_code' => 'required|string|size:3|exists:countries,country_iso_code',
                    'price' => 'required|numeric',
                ]);

                try {
                    $dish = Dish::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'ingredients' => $request->ingredients,
                        'calories' => $request->calories,
                        'country_iso_code' => $request->country_iso_code,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Dish saved successfully..'];
                    return redirect()->route('d.dishes')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => $th->getMessage()];
                    //$msg = ['customError' => 'An error occured while saving dish data, try again..'];
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
                    $addon = DishAddon::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'calories' => $request->calories,
                        'country_iso_code' => $request->country_iso_code,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Addon saved successfully..'];
                    return redirect()->route('d.dishes')->with($msg);
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
                    $tag = DishTag::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Tag saved successfully..'];
                    return redirect()->route('d.dishes')->with($msg);
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
            case 'dish':
                $dish = Dish::findOrFail($type_id);
                $dish->status = 0;
                $dish->save();
                $msg = ['customSuccess' => 'Dish data deleted successfully..'];
                return redirect()->back()->with($msg);
                break;

            case 'addon':
                $addon = DishAddon::findOrFail($type_id);
                $addon->status = 0;
                $addon->save();
                $msg = ['customSuccess' => 'Addon data deleted successfully..'];
                return redirect()->back()->with($msg);
                break;

            case 'tag':
                $tag = DishTag::findOrFail($type_id);
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
       // return $type;
        switch ($type) {
            case 'addons':
                $dish = Dish::find($request->dish_id);
                $dish->dishes_addons()->sync($request->addon_ids);
                $msg = ['customSuccess' => 'Addons attached successfully'];
                return redirect()->back()->with($msg);
            case 'tag':
                $dish = Dish::find($request->dish_id);
                $dish->dishes_tags()->sync($request->tag_ids);
                $msg = ['customSuccess' => 'Tag attached successfully'];
                return redirect()->back()->with($msg);

            default:
                $msg = ['customError' => 'Wrong URL, try again later'];
                return redirect()->back()->with($msg);
        }
    }

    public function remove_type($type, $dish_id, $type_id)
    {
        switch ($type) {
            case 'addons':
                $dish = Dish::find($dish_id);
                $dish->dishes_addons()->detach($type_id);
                $msg = ['customSuccess' => 'Addons removed successfully'];
                return redirect()->back()->with($msg);

            case 'tag':
                $dish = Dish::find($dish_id);
                $dish->dishes_tags()->detach($type_id);
                $msg = ['customSuccess' => 'Tag removed successfully'];
                return redirect()->back()->with($msg);

            default:
                $msg = ['customError' => 'Wrong URL, try again later'];
                return redirect()->back()->with($msg);
        }
    }
}
