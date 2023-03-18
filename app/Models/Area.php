<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $photo_url
 * @property $video_url
 * @property $status
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Area extends Model
{

    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','photo_url','video_url','status','user_id'];

    protected $appends = [
        'image_url',
        'video_path',
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
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
