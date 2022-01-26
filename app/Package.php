<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name',
        'room_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_delete' => 'boolean',
    ];

    public function rate()
    {
        return $this->hasOne(Rate::class, 'package_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
