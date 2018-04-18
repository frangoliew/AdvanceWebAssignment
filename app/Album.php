<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'albumtitle',
      'description',
      'monthyear',
      'userid',
    ];

    public function photos()
    {
      return $this->hasMany(Photo::class,'albumidreference');
    }

    public function users()
    {
      return $this0->belongsTo(User::class,'userid');
    }
}
