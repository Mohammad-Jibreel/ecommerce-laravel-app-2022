<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class,'category_id');
    }

    /**
     * The roles that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Order_items::class);
    }
    /**
     * The roles that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(order::class,'Order_products','order_id','product_id');
    }



 /**
  * Get all of the comments for the Product
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
 public function prodcuts_attributes()
 {
     return $this->hasMany(ProductsAttribtues::class, 'product_id');
 }
 /**
  * The roles that belong to the Product
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 public function  users()
 {
     return $this->belongsToMany(User::class,'carts','user_id','product_id')->withPivot('id','quantity','size');
 }
}
