<?php

namespace App\Models;
use App\Models\Cart;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 /**
  * Get all of the comments for the User
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
  /**
   * Get all of the comments for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orders()
  {
      return $this->hasMany(orders::class);
  }
  /**
   * Get the user that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function products()
  {
      return $this->belongsToMany(Product::class,'carts','user_id','product_id')->withPivot('id','quantity','size');
  }
  /**
   * Get all of the comments for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function Address()
  {
      return $this->hasMany(UserAddress::class);
  }
  /**
   * The roles that belong to the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */

}
