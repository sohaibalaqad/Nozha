<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $icon
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{

    static $rules = [
		'title' => 'required',
		'description' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','photo_url'];


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



}
