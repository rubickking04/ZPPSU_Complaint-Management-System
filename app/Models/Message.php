<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'user_id',
        'body',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     *
     * Define the relationship between User and Messages models.
     *
     */
    public function reciever(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
     * Define the relationship between User and Messages models.
     *
     */
    public function sender(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     *
     * Define the relationship between User and Messages models.
     *
     */
    public function reply(){
        return $this->belongsTo(Reply::class, 'message_id');
    }
}
