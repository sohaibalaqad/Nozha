<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 *
 * @property $id
 * @property $image_url
 * @property $title
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slider extends Model
{

    static $rules = [

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image_url','title','description'];

    protected $appends = [
        'image_uri',
    ];
    public function getImageUriAttribute()
    {
        if (!$this->image_url) {
            return 'https://via.placeholder.com/300';
        }
        if (stripos($this->image_url, 'http') === 0) {
            return $this->image_url;
        }
        return asset('storage' . substr($this->image_url, 6));
    }

}
