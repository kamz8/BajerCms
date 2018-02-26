<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'accepted', 'start_date', 'end_date'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function note(){
        return $this->belongsToMany('Event');
    }

        public function getEvents($startDate = null, $endDate = null)
    {
        return $this
            ->where('start_date', '>=', $startDate)
            ->where('end_date', '<=', $endDate)
            ->get();
    }


    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
    }
}
