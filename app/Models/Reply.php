<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'user_id',
        'message_id',
        'body',
    ];

    /**
     *
     * Define the relationship between User and Messages models.
     *
     */
    public function recipient(){
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
    public function message(){
        return $this->belongsTo(Message::class, 'message_id');
    }
}
