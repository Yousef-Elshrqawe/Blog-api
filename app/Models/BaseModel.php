<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use UploadTrait;

    public function getImageAttribute() {
        if ($this->attributes['image']) {
            $image = $this->getImage($this->attributes['image'], static::IMAGEPATH);
        } else {
            $image = $this->defaultImage( static::IMAGEPATH);
        }
        return $image;
    }

    public function setImageAttribute($value) {
        if (null != $value && is_file($value) ) {
            isset($this->attributes['image']) ? $this->deleteFile($this->attributes['image'] , static::IMAGEPATH) : '';
            $this->attributes['image'] = $this->uploadAllTyps($value, static::IMAGEPATH);
        }
    }

    public static function boot() {
        parent::boot();
        /* creating, created, updating, updated, deleting, deleted, forceDeleted, restored */

        static::deleted(function($model) {
            if (isset($model->attributes['image'])) {
                $model->deleteFile($model->attributes['image'], static::IMAGEPATH );
            }
        });

    }
}
