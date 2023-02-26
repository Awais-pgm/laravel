<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'title', 'data' 
    ]; 
}
