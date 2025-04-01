<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable =
    ['name', 'price', 'quantity', 'image', 'category_id', 'description', 'status'];
    // Mối quan hệ diaysensip
    //hasMany là 1 nhiều 
    //belongsTo là 1 1
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
