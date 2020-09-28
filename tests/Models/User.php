<?php

namespace GiangNT\LaravelNotification\Tests\Models;
use Illuminate\Database\Eloquent\Model;
use GiangNT\LaravelNotification\HasPlayer;
use GiangNT\LaravelNotification\InteractsWithPlayer;

class User extends Model implements HasPlayer
{
    use InteractsWithPlayer;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
