<?php

namespace Larashim\Uuid\Traits;

use Illuminate\Support\Str;

trait HasUuidPrimaryKey
{
    /**
     * Boot trait.
     *
     * @return void
     */
    protected static function bootUuidPrimaryKey()
    {
        static::creating(static function ($model) {
            $model->keyType = 'uuid';
            $model->incrementing = false;
            $model->{$model->getKeyName()} = (string) ($model->uuidOrdered ? Str::orderedUuid() : Str::uuid());
        });
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        $this->casts[$this->getKeyName()] = 'uuid';

        return $this->casts;
    }

    /**
     * Get the model key type.
     *
     * @return array
     */
    public function getKeyType()
    {
        return 'uuid';
    }
}
