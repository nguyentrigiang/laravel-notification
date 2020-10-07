<?php

namespace GiangNT\LaravelNotification\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use GiangNT\LaravelNotification\HasPlayer;
use GiangNT\LaravelNotification\HasConfiguration;
use GiangNT\LaravelNotification\InteractsWithPlayer;
use GiangNT\LaravelNotification\InteractsWithConfiguration;
use Illuminate\Notifications\Notifiable;

class User extends Model implements HasPlayer, HasConfiguration
{
    use InteractsWithPlayer, InteractsWithConfiguration, Notifiable;

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
    protected $fillable = ['name', 'email', 'password'];
}
