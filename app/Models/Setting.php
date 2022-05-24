<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['disable_comments', 'moderate_comments', 'email_notification'];

    protected $casts = [
        'email_notification' =>'array'
    ];
}
