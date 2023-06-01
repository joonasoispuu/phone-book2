<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        "groups_time",
    ];

    public function contact() : HasOne{
        return $this->hasOne(Contact::class);
    }

    public function client() : HasOne{
        return $this->hasOne(User::class);
    }

    public function server() : HasOne{
        return $this->hasOne(User::class);
    }
}
