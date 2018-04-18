<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phototitle',
        'albumidreference',
    ];

    public function albums()
    {
      return $this->belongsTo(Album::class,'albumidreference');
    }
}
