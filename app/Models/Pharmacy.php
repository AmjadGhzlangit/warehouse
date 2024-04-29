<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name', 'address', 'phone','email','license_image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
