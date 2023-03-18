<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Path
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $date
 * @property $start
 * @property $end
 * @property $photo_url
 * @property $distance
 * @property $fees
 * @property $status
 * @property $area_id
 * @property $coordinator_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property Coordinator $coordinator
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Path extends Model
{

    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'date' => 'required',
		'start' => 'required',
		'end' => 'required',
		'distance' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','date','start','end','photo_url','distance','fees','status','area_id','coordinator_id'];


    protected $appends = [
        'image_url',
    ];
    public function getImageUrlAttribute()
    {
        if (!$this->photo_url) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url, 'http') === 0) {
            return $this->photo_url;
        }
        return asset('storage' . substr($this->photo_url, 6));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coordinator()
    {
        return $this->hasOne('App\Models\Coordinator', 'id', 'coordinator_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'path_subscription');
    }
}
