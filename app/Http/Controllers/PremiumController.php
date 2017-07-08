<?php

namespace App\Http\Controllers;

use App\Premium;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function getPremium(Request $request)
    {
        $products = Premium::all();
        $productArray = [];
        $count = 0;
        foreach ($products as $product)
        {
            $productArray[$count++] = $product->medicine_list;
        }

        return view('premium', compact('products','productArray','count'));
    }

    public function insertProduct(Request $request)
    {
        $productids = str_replace("\r\n", " ", $request['data-holder']);
        $productarray = explode(" ", $productids);
        $products = "";
        foreach ($productarray as $item)
        {
            $products = $products .$item.',';
        }
        $products = str_replace_last(',','',$products);
        $premium = new Premium([
           'first_name' => $request['fname'] ,
            'last_name' => $request['lname'] ,
            'medicine_list' => $products ,
        ]);
        $premium->save();
        return redirect()->route('getpremium');

    }


}
