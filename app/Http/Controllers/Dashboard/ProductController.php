<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageTrait;

    public function list(Request $request = null)
    {
        if ($request == null || $request->country == 'all') {
            $products = Product::where('status', 1)->paginate(20);
        } else {
            $products = Product::where([
                ['status', 1],
                ['country_iso_code', $request->country]
            ])->paginate(20);
        }
        return view('products.list', compact('products'));
    }

    public function new()
    {
        return view('products.new');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'country' => 'required|string|size:3',
            'price' => 'required|numeric',
            'description_en' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);

        $image_name = $this->saveImage($request->image);

        try {
            $product = Product::create([
                'image' => $image_name,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'price' => $request->price,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'country_iso_code' => $request->country,
                'created_by' => auth()->id(),
            ]);

            $msg = ['customSuccess' => 'Product saved successfully..'];
            return redirect()->route('d.products.list')->with($msg);
        } catch (\Throwable $th) {
            $msg = ['customError' => 'An error occured while saving product data, try again..'];
            return redirect()->back()->with($msg)->withInput();
        }
    }

    public function soft_delete($product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->status == 1) {
            try {
                $product->status = 0;
                $product->save();
                $msg = ['customSuccess' => $product->name_en . ' is deleted successfully'];
            } catch (\Throwable $th) {
                $msg = ['customError' => 'An error occured while deleting ' . $product->name_en];
            }
        }
        return redirect()->route('d.products.list')->with($msg);
    }
}
