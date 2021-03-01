<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Log extends Model
{
    //
    protected $fillable=[
        'slug','name'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
