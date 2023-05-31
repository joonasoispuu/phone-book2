<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name' => 'required|string|max:128',
            'ContactType' => 'required|string|max:30',
            'ContactValue' => 'required|string|max:30',
            'description' => 'required|string|max:255',
    ];
}
