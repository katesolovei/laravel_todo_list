<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Controllers\TaskController;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'priority',
        'status',
        'user_id',
        'parent'
    ];

//    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
