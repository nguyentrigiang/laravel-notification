<?php

namespace GiangNT\LaravelNotification\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    /**
     * Declare the table name
     */
    protected $table = 'notification_configuration';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'days_of_the_week' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time', 'end_time', 'days_of_the_week'
    ];

    /**
     * Get a ownership model.
     */
    public function owner()
    {
        return $this->morphTo();
    }
}
