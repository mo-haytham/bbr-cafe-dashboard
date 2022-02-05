<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $countries = Country::where('status', 1)->get();
        $branches = Branch::where('status', 1)->get();
        return view('branches.index', compact(['countries', 'branches']));
    }

    public function country_save(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:128',
            'name_ar' => 'required|string|max:128',
            'country_iso_code' => 'required|string|size:3',
            'currency' => 'required|string|max:8',
        ]);
        try {
            $country_exist = Country::where('country_iso_code', $request->country_iso_code)->first();
            if ($country_exist) {
                Country::where('country_iso_code', $request->country_iso_code)->update([
                    'name_en' => $request->name_en,
                    'name_ar' => $request->name_ar,
                    'currency' => $request->currency,
                    'status' => 1,
                    'created_by' => auth()->id(),
                ]);
            } else {
                $country = Country::create([
                    'name_en' => $request->name_en,
                    'name_ar' => $request->name_ar,
                    'country_iso_code' => $request->country_iso_code,
                    'currency' => $request->currency,
                    'created_by' => auth()->id(),
                ]);
            }
            $msg = ['customSuccess' => 'Country add successfully..'];
            return redirect()->route('d.branches')->with($msg);
        } catch (\Throwable $th) {
            $msg = ['customError' => 'An error occured while saving country data, try again..'];
            return redirect()->back()->with($msg)->withInput();
        }
    }

    public function country_delete($country_id)
    {
        $country = Country::findOrFail($country_id);
        if ($country->status == 1) {
            try {
                $country->status = 0;
                $country->save();
                $msg = ['customSuccess' => $country->name_en . ' is deleted successfully'];
            } catch (\Throwable $th) {
                $msg = ['customError' => 'An error occured while deleting ' . $country->name_en];
            }
        }
        return redirect()->route('d.branches')->with($msg);
    }

    public function branch_save(Request $request)
    {
        //return $request;
        $request->validate([
            'name_en' => 'required|string|max:128',
            'name_ar' => 'required|string|max:128',
            'country_iso_code' => 'required|string|size:3',
            'is_default' => 'nullable',
            'address_en' => 'required|string|max:255',
            'address_ar' => 'required|string|max:255',
            'mobile' => 'required|array',
            'mobile.*' => 'required|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        if (isset($request->is_default) && $request->is_default == "on") $is_default = true;
        else $is_default = false;

        $info = [];
        $info['facebook'] = $request->facebook;
        $info['twitter'] = $request->twitter;
        $info['instagram'] = $request->instagram;
        $info['address_en'] = $request->address_en;
        $info['address_ar'] = $request->address_ar;
        $info['mobile'] = $request->mobile;

        //return json_encode($info,true);

        try {
            Branch::where('is_default', 1)->update(['is_default' => 0]);
            $branch = Branch::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'country_iso_code' => $request->country_iso_code,
                'is_default' => $is_default,
                'info' => json_encode($info),
                'created_by' => auth()->id(),
            ]);
            $msg = ['customSuccess' => $branch->name_en . 'Branch add successfully..'];
            return redirect()->route('d.branches')->with($msg);
        } catch (\Throwable $th) {
            //$msg = ['customError' => 'An error occured while saving branch data, try again..'];
            $msg = ['customError' => $th->getMessage()];
            return redirect()->back()->with($msg)->withInput();
        }
    }

    public function set_branch_default(Request $request)
    {
        Branch::where('is_default', 1)->update([
            'is_default' => 0,
        ]);
        $branch = Branch::find($request->branch_id);
        $branch->is_default = 1;
        $branch->save();
        return true;
    }
}
