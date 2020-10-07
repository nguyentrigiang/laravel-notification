<?php

namespace GiangNT\LaravelNotification;

use GiangNT\LaravelNotification\Models\Configuration;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait InteractsWithConfiguration
{
    public function configuration(): MorphOne
    {
        return $this->morphOne(Configuration::class, 'owner');
    }

    /**
     * Add the configuration to owner.
     * @param $data
     */
    public function addConfiguration($data)
    {
        $this->resetConfiguration();

        return $this->configuration()->create($data);
    }

    /**
     * reset the configuration.
     * @param $data
     */
    public function resetConfiguration()
    {
        return $this->configuration()->delete();
    }
}
