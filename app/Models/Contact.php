<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
<<<<<<< HEAD
=======
        "phonenumber",
>>>>>>> d86b4bfa57663e9aa4f2a4093295a22011d29c6a
        'ContactType',
        'ContactValue',
        'description',
    ];

    public function user(): BelongsTo
    {
<<<<<<< HEAD
        return $this->belongsTo(User::class);
=======
        return $this->belongsTo(Group::class);
>>>>>>> d86b4bfa57663e9aa4f2a4093295a22011d29c6a
    }
}
