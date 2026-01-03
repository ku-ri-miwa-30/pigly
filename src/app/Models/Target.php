<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Target extends Model
{
    use HasFactory;
    protected $table = 'weight_target';
    protected $fillable = ['target_weight'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
