<?php

namespace App\Http\Controllers;

use App\SubInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Invoice;

class InvoiceController extends Controller
{
    public function getbill()
    {
        $products = Product::where('flag', 1)->get();
        return view('billing', ['products' => $products,'quantity'=>0,'product_name'=>'']);
    }


    public function printTable(Request $request)
    {
        $number = rand(10, 99) . time();
        $this->validate($request,[
            'p_name'=>'required',
            'p_address'=>'required',
            'd_name'=>'required',
            'd_address'=>'required'
        ]);
        if ($request['data-holder'] === null) {
            echo $request['data-holder'];
            return redirect()->route('getbill', ['error' => 'missing']);
        } else {
            $productids = str_replace("\r\n", " ", $request['data-holder']);
            $productarray = explode(" ", $productids);
            $quantites = str_replace("\r\n", " ", $request['Qty-holder']);
            $quantityarray = explode(" ", $quantites);
            $priceArray = [];
            $products = null;
            //  dd($request['data-holder']);
            for ($i = 0; $i < count($productarray); $i++) {
                $products[$i] = Product::where('id', $productarray[$i])->first();
                if($products[$i]->quantity < $quantityarray[$i])
                {
                    $sendproducts = Product::where('flag', 1)->get();
                    return view('billing', ['products' => $sendproducts,'quantity'=>$quantityarray[$i],'product_name'=>$products[$i]->product_name]);

                }
            }
            $patient_name = $request['p_name'];
            $patient_address = $request['p_address'];
            $doctor_name = $request['d_name'];
            $doctor_address = $request['d_address'];
            for ($i = 0; $i < count($products); $i++) {
                $priceArray[$i] = $products[$i]->price * $quantityarray[$i];
            }
            $totalprice = 0;
            foreach ($priceArray as $product) {
                $totalprice += $product;
            }
            session(['products' => $products]);
            session(['p_name' => $patient_name]);
            session(['p_address' => $patient_address]);
            session(['d_name' => $doctor_name]);
            session(['d_address' => $doctor_address]);
            session(['quantity' => $quantityarray]);
            session(['prices' => $priceArray]);
            session(['invoice' => $number]);
            session(['totalprice' => $totalprice]);


            return view('print', compact('totalprice', 'number', 'products', 'quantityarray', 'priceArray', 'patient_name', 'patient_address', 'doctor_name', 'doctor_address'));

        }
    }

    public function printData2(Request $request)
    {
        for ($i = 0; $i < count($request->session()->get('products')); $i++) {
            $sumInvoices = new SubInvoice([
                'invoice_id' => $request->session()->get('invoice'),
                'product_id' => $request->session()->get('products')[$i]->id,
                'quantity' => $request->session()->get('quantity')[$i],
                'price' => $request->session()->get('prices')[$i],

            ]);
            $sumInvoices->save();
        }
        $this->updateProductsTable($request);
        $invoice = new Invoice([
            'Invoice_id' => $request->session()->get('invoice'),
            'p_name' => $request->session()->get('p_name'),
            'p_address' => $request->session()->get('p_address'),
            'd_name' => $request->session()->get('d_name'),
            'd_address' => $request->session()->get('d_address'),
            'totalprice' => $request->session()->get('totalprice')
        ]);
        $invoice->save();
        return redirect()->route('getbill');
    }

    function updateProductsTable(Request $request)
    {
        for ($i = 0 ; $i < count($request->session()->get('products'));$i++)
        {
            $product = Product::where('id', $request->session()->get('products')[$i]->id)->first();
            $product->quantity = $product->quantity  - $request->session()->get('quantity')[$i];
            $product->save();
        }
    }
}
