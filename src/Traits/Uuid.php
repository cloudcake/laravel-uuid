<?php

namespace Uuid\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait Uuid
{
    protected static $uuidOrdered = true;
    protected static $uuidKey = 'uuid';

    /**
     * Boot trait.
     *
     * @return void
     */
    protected static function bootUuid()
    {
        static::creating(static function ($model) {
            $model->{static::getUuidKey()} = (string) ($model->wantsOrderedUuid() ? Str::orderedUuid() : Str::uuid());
        });
    }

    /**
     * A query scope to find a model by UUID.
     *
     * @return self;
     */
    public static function findUuid($uuid)
    {
        return self::where(static::getUuidKey(), $uuid)->first();
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        $this->casts[$this->getUuidKey()] = 'uuid';

        return $this->casts;
    }

    /**
     * Returns true if the model should use an ordered UUID.
     *
     * @return string
     */
    protected function wantsOrderedUuid()
    {
        return self::$uuidOrdered ?? true;
    }

    /**
     * Get the defined uuid name attribute.
     *
     * @return string
     */
    protected static function getUuidKey()
    {
        return self::$uuidKey ?? 'uuid';
    }
}
