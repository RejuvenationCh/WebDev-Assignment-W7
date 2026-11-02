<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public const SERVICES = ['Photography', 'Video Editing', 'App/Website', 'Other'];

    protected $fillable = [
        'name',
        'email',
        'service',
        'message',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];
}
