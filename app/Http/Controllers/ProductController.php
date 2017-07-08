<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function getdashboard()
    {
        $products = Product::where('flag',1)->get();
        $count = count($products);
        $expiryCount = 0;
        $expiryids = null;
        $date = null;
        $today = Carbon::today()->month;
        $thisYear = Carbon::today()->year;
        foreach ($products as $product) {
            $expdate = Carbon::parse($product->exp_date)->month;
            $expYear = Carbon::parse($product->exp_date)->year;
            if (($expdate - $today <= 1)&& ($thisYear >= $expYear) ) {
                $expiryids[$expiryCount++] = $product;
            }
        }
        return view('dashboard2', compact('products','expiryids', 'count','expiryCount'));
    }
    public function deleteexpire($id)
    {
        $delete = Product::where('id', $id)->delete();
        return redirect()->back();
    }

    public function product_get()
    {
        $products = Product::where('flag',1)->get();
        return view('product', ['products' => $products]);
    }

    public function product_post(Request $request)
    {
        $img = $request['hidden'];
        $filteredData = substr($img, strpos($img, ",") + 1);
        $unencodedData = base64_decode($filteredData);
        $no = rand(rand(), rand());
        $data = "images/" . $no . ".png";
        file_put_contents($data, $unencodedData);
         $this->validate($request, [
                  'product_name' => 'required|max:120',
                  'product_company' => 'required|max:120',
                  'quantity' => 'required',
                  'price' => 'required',
                  'mfg_date' => 'required|date',
                  'exp_date' => 'required|date',
                  'arrival_date' => 'required|date',
                  'distributor' => 'required',
                  'batch' => 'required'
              ]);
        $products = new Product([
            'product_company' => $request->input('product_company'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'mfg_date' => $request->input('mfg_date'),
            'exp_date' => $request->input('exp_date'),
            'arrival_date' => $request->input('arrival_date'),
            'distributor' => $request->input('distributor'),
            'batch' => $request->input('batch'),
            'img' => $no,  'product_name' => $request->input('product_name'),


        ]);
        $products->save();
        return redirect()->back();
    }

    public function editproduct(Request $request, $id)
    {
        $result = Product::where('id', $id)->get();
        return view('edit_product', ['result' => $result, 'id' => $id]);

    }

    public function updateproduct(Request $request)
    {
        // echo $request->input('product_id') ;
        if ($request['hidden'] == 'remove') {
            Product::where('id', $request->input('product_id'))
                ->update(['img' => ' ']);
            return redirect()->back();
        } else {
            if ($request['hidden_data'] == null) {
                Product::where('id', $request->input('product_id'))
                    ->update([
                        'product_name' => $request->input('product_name'),
                        'product_company' => $request->input('product_company'),
                        'quantity' => $request->input('quantity'),
                        'price' => $request->input('price'),
                        'mfg_date' => $request->input('mfg_date'),
                        'exp_date' => $request->input('efg_date'),
                        'arrival_date' => $request->input('arrival_date'),
                        'distributor' => $request->input('distributor'),
                        'batch' => $request->input('batch'),
                    ]);
            } else {
                $img = $request['hidden_data'];
                $filteredData = substr($img, strpos($img, ",") + 1);
                $unencodedData = base64_decode($filteredData);
                $no = rand().time();
                $data = "images/" . $no . ".png";
                file_put_contents($data, $unencodedData);
                Product::where('id', $request->input('product_id'))
                    ->update([
                        'product_name' => $request->input('product_name'),
                        'product_company' => $request->input('product_company'),
                        'quantity' => $request->input('quantity'),
                        'price' => $request->input('price'),
                        'mfg_date' => $request->input('mfg_date'),
                        'exp_date' => $request->input('efg_date'),
                        'arrival_date' => $request->input('arrival_date'),
                        'distributor' => $request->input('distributor'),
                        'batch' => $request->input('batch'),
                        'img' => $no
                    ]);

            }
            return redirect()->route('product_get');
        }
    }

    public function productdestroy($id)
    {
        $vendors = Product::where('id', $id)->first();
        $vendors->flag = 0;
        $vendors->save();
        return redirect()->back();
    }

    public function viewproduct($id)
    {
        $vendors = Product::where('id', [$id]);
        //$vendor = Product::where('id', 1)->get();

        return view("product", ['products' => $vendors]);
    }

    public function index()
    {
        return view("index");
    }


}
