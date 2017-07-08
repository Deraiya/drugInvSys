<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function showHistory()
    {
        $invoices = Invoice::all();
        $productsArray = null;
        $count = 0;
        $productNames = null;
        $count = 0;
        foreach ($invoices as $invoice) {
            $productsArray[$count++] = $invoice->getProducts();
        }
        $count = 0;

        for ($i=0;$i<count($invoices);$i++)
            foreach ($productsArray[$i] as $item) {
                $productNames[$count++] = $item->getProducts()->product_name;
            }

     //   dd($productNames);
        return view('history', compact('invoices', 'productsArray','productNames'));
    }

}
