<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $phone
 * @property $subject
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Message extends Model
{

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'subject' => 'required',
		'message' => 'required',
    ];

    protected $table = 'messages';
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','phone','subject','message'];



}
