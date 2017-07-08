<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='products';
  protected $fillable = [
      'product_name','product_company','quantity','price','mfg_date','exp_date','arrival_date','distributor','batch','img','flag',
  ];
  protected $hidden = [
      'password', 'remember_token',
  ];
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
