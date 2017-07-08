<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded =[];
    public function products(){
        return Product::where('id',$this->product_id)->first();
    }
    public function getProducts(){
        return SubInvoice::where('invoice_id',$this->Invoice_id)->get();
    }
}
