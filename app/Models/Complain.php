<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complain extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'incident_date',
        'incident_place',
        'incident_event',
        'incident_attempted',
        'description',
        'complain_attempts',
        'solution',
        'file',
        'detail',
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
     * Define the relationship between User and Complain models.
     *
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
