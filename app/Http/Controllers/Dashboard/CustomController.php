<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CustomChoice;
use App\Models\CustomChoiceOption;
use App\Models\CustomChoiceOptionType;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function index()
    {
        $countries = Country::select('id', 'name_en', 'country_iso_code', 'currency')->where('status', 1)->get();
        $choices = CustomChoice::where('status', 1)->get();
        $options = CustomChoiceOption::where('status', 1)->get();
        $types = CustomChoiceOptionType::where('status', 1)->get();

        return view('custom.index', compact(['countries', 'choices', 'options', 'types']));
    }

    // types: dish, addon, tag
    public function save_type($type, Request $request)
    {
        //return $request->country_iso_code;
        switch ($type) {
            case 'choice':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'description' => 'nullable|string',
                    'country_iso_code' => 'required|string|size:3|exists:countries,country_iso_code',
                    'price' => 'required|numeric',
                ]);

                try {
                    $choice = CustomChoice::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'description' => $request->description,
                        'country_iso_code' => $request->country_iso_code,
                        'base_price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Choice saved successfully..'];
                    return redirect()->route('d.custom')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => $th->getMessage()];
                    return redirect()->back()->with($msg)->withInput();
                }

            case 'option':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'is_required' => 'nullable',
                    'choice_id' => 'required|numeric|exists:custom_choices,id',
                    'max_choices' => 'required|numeric',
                ]);

                if ($request->is_required == 'on') {
                    $is_required = true;
                } else {
                    $is_required = false;
                }

                try {
                    $option = CustomChoiceOption::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'is_required' => $is_required,
                        'max_choices' => $request->max_choices,
                        'custom_choice_id' => $request->choice_id,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Option saved successfully..'];
                    return redirect()->route('d.custom')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving addon data, try again..'];
                    return redirect()->back()->with($msg)->withInput();
                }

            case 'type':
                $request->validate([
                    'name_en' => 'required|string',
                    'name_ar' => 'required|string',
                    'option_id' => 'required|numeric|exists:custom_choice_options,id',
                    'calories' => 'nullable|numeric',
                    'price' => 'required|numeric',
                ]);

                try { 
                    $type = CustomChoiceOptionType::create([
                        'name_en' => $request->name_en,
                        'name_ar' => $request->name_ar,
                        'custom_choice_option_id' => $request->option_id,
                        'calories' => $request->calories,
                        'price' => $request->price,
                        'created_by' => auth()->id(),
                    ]);

                    $msg = ['customSuccess' => 'Tag saved successfully..'];
                    return redirect()->route('d.custom')->with($msg);
                } catch (\Throwable $th) {
                    $msg = ['customError' => 'An error occured while saving tag data, try again..'];
                    //$msg = ['customError' => $th->getMessage()];
                    return redirect()->back()->with($msg)->withInput();
                }

            default:
                abort(404);
        }
    }

    // types: dish, addon, tag
    public function delete_type($type, $type_id)
    {
        switch ($type) {
            case 'choice':
                $choice = CustomChoice::findOrFail($type_id);
                $choice->status = 0;
                $choice->save();
                $msg = ['customSuccess' => 'Choice data deleted successfully..'];
                return redirect()->back()->with($msg);

            case 'option':
                $option = CustomChoiceOption::findOrFail($type_id);
                $option->status = 0;
                $option->save();
                $msg = ['customSuccess' => 'Option data deleted successfully..'];
                return redirect()->back()->with($msg);

            case 'type':
                $type = CustomChoiceOptionType::findOrFail($type_id);
                $type->status = 0;
                $type->save();
                $msg = ['customSuccess' => 'Tag data deleted successfully..'];
                return redirect()->back()->with($msg);

            default:
                abort(404);
        }
    }
}
