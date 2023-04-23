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
    protected $fillable = ['name','description','date','start','end','photo_url_1','photo_url_2','photo_url_3','photo_url_4','photo_url_5','distance','fees','status','area_id','coordinator_id','rstatus'];


    protected $appends = [
        'image_url',
        'image_url_2',
        'image_url_3',
        'image_url_4',
        'image_url_5',
        'video_path',
    ];
    public function getImageUrlAttribute()
    {
        if (!$this->photo_url_1) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url_1, 'http') === 0) {
            return $this->photo_url_1;
        }
        return asset('storage' . substr($this->photo_url_1, 6));
    }

    public function getImageUrl2Attribute()
    {
        if (!$this->photo_url_2) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url_2, 'http') === 0) {
            return $this->photo_url_2;
        }
        return asset('storage' . substr($this->photo_url_2, 6));
    }

    public function getImageUrl3Attribute()
    {
        if (!$this->photo_url_3) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url_3, 'http') === 0) {
            return $this->photo_url_3;
        }
        return asset('storage' . substr($this->photo_url_3, 6));
    }

    public function getImageUrl4Attribute()
    {
        if (!$this->photo_url_4) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url_4, 'http') === 0) {
            return $this->photo_url_4;
        }
        return asset('storage' . substr($this->photo_url_4, 6));
    }

    public function getImageUrl5Attribute()
    {
        if (!$this->photo_url_5) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->photo_url_5, 'http') === 0) {
            return $this->photo_url_5;
        }
        return asset('storage' . substr($this->photo_url_5, 6));
    }

    public function getVideoPathAttribute()
    {
        if (!$this->video_url) {
            return '';
        }
        if (stripos($this->video_url, 'http') === 0) {
            return $this->video_url;
        }
        return asset('storage' . substr($this->video_url, 6));
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

    public function review()
    {
        return $this->hasOne(review::class);
    }

}
