<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded=[];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The roles that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'Order_products','order_id','product_id');
    }


    public function getStatusAttribute($value) {
        $Status=null;
        if($value==0) {
            $Status='Processing';
        }
         if($value==1) {
            $Status='Shipped';
        }
        if($value==2) {
            $Status='Delivered';
        }
         if($value==3) {
            $Status='Complete';

        }
         if($value==4) {
            $Status='Canceled';

        }

        return $Status;




    }


/**
 * Get all of the payments for the Order
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function payments()
{
    return $this->hasMany(Payment::class);
}

}

