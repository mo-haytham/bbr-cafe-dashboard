<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomChoice;
use App\Models\CustomChoiceOptionType;
use App\Models\Dessert;
use App\Models\DessertAddon;
use App\Models\Dish;
use App\Models\DishAddon;
use App\Models\Drink;
use App\Models\DrinkOption;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function sync()
    {
        $order_count = Order::where('status', 0)->count();
        $reservation_count = Reservation::where('status', 0)->count();
        return response(['order_count' => $order_count, 'reservation_count' => $reservation_count], 200);
    }

    public function update_price(Request $request)
    {
        // return $request;
        switch ($request->type) {
            case 'dish':
                Dish::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'dessert':
                Dessert::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'dish_addon':
                DishAddon::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'dessert_addon':
                DessertAddon::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'drink':
                Drink::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'drink_option':
                DrinkOption::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            case 'custom_choice':
                CustomChoice::where('id', $request->id)->update([
                    'base_price' => $request->new_price
                ]);
                return true;

            case 'custom_choice_option_type':
                CustomChoiceOptionType::where('id', $request->id)->update([
                    'price' => $request->new_price
                ]);
                return true;

            default:
                return false;
        }
    }
}
