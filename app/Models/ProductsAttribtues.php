<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttribtues extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $tables='products_attribtues';
    /**
     * Get the user that owns the products_attribtues
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(product::class,'product_id');
    }
    public function getSizeAttribute($value) {
        $size=null;
        if($value==0) {
            $size='S';
        }
         if($value==1) {
            $size='M';
        }
        if($value==2) {
            $size='L';
        }
         if($value==3) {
            $size='xL';

        }
         if($value==4) {
            $size='xXL';

        }

        return $size;




    }
}
