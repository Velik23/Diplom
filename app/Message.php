<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property string encode
 * @property mixed message
 * @property float time
 * @property mixed type
 * @property string key
 * @property bool|string iv
 * @property string message_type
 * @property false|string path
 * @property string encrypt_parh
 */
class Message extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFileEncodeAttribute(): ?string
    {
        $content = Storage::get($this->encrypt_parh);

        if ($content < 1000) {
            return $content;
        }

        return null;
    }

    public function getFileTextAttribute(): ?string
    {
        $content = Storage::get($this->path);

        if ($content < 1000) {
            return $content;
        }

        return null;
    }

    public function getFileMessageAttribute(): ?string
    {
        $content = Storage::get($this->encrypt_parh);

        if ($content < 1000) {
            return $content;
        }

        return null;
    }
}
