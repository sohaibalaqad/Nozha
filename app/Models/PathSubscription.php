<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PathSubscription
 *
 * @property $path_id
 * @property $subscription_id
 *
 * @property Path $path
 * @property Subscription $subscription
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PathSubscription extends Model
{

//    static $rules = [
//		'path_id' => 'required|unique:path_subscription,path_id',
//		'subscription_id' => 'required|unique:path_subscription,subscription_id,NULL,id,path_id,' . $path_id_value,
//    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['path_id','subscription_id'];

    public $timestamps = false;

    protected $table = 'path_subscription';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function path()
    {
        return $this->hasOne('App\Models\Path', 'id', 'path_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscription()
    {
        return $this->hasOne('App\Models\Subscription', 'id', 'subscription_id');
    }


}
