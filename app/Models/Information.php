<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'student_id',
        'department',
        'section',
        'year_level',
        'address',
        'phone_number'
    ];

    /**
     *
     * Define the relationship between User and Employee models.
     *
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
