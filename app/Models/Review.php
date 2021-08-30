<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'title',
        'description',
        'rating',
        'reviewed_at'
    ];
    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
