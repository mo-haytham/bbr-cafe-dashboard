<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Drink;
use App\Models\DrinkOption;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    public function index()
    {
        $countries = Country::where('status', 1)->get();
        $drinks = Drink::where('status', 1)->get();
        $options = DrinkOption::where('status', 1)->get();
        return view('drinks.index', compact('countries', 'drinks', 'options'));
    }

    public function save($type, Request $request)
    {

        switch ($type) {
            case 'drink':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'ingredients' => 'nullable|string',
                    'country_iso_code' => 'required|string|size:3|exists:countries,country_iso_code',
                    'price' => 'required|numeric',
                ]);

                try {
                    $dish = Drink::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'calories' => $request->calories,
                        'country_iso_code' => $request->country_iso_code,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Drink saved successfully..'];
                    return redirect()->route('d.drinks')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => $th->getMessage()];
                    return redirect()->back()->with($msg)->withInput();
                }

            case 'option':
                $request->validate([
                    'drink_id' => 'required|numeric|exists:drinks,id',
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'price' => 'required|numeric',
                ]);

                try {
                    $addon = DrinkOption::create([
                        'drink_id' => $request->drink_id,
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Drink Option saved successfully..'];
                    return redirect()->route('d.drinks')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving drink option data, try again..'];
                    return redirect()->back()->with($msg)->withInput();
                }

                break;

            default:
                abort(404);
                break;
        }
    }

    public function delete($type, $type_id)
    {
        switch ($type) {
            case 'drink':
                Drink::where('id', $type_id)->update([
                    'status' => 0,
                ]);
                $msg = ['customSuccess' => 'Drink data deleted successfully..'];
                return redirect()->back()->with($msg);

            case 'option':
                DrinkOption::where('id', $type_id)->update([
                    'status' => 0,
                ]);
                $msg = ['customSuccess' => 'Drink data deleted successfully..'];
                return redirect()->back()->with($msg);

            default:
                # code...
                break;
        }
    }
}
