<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubInvoice extends Model
{
    protected $guarded = [];

    public function getProducts(){
        return Product::where('id',$this->product_id)->first();
    }
}
