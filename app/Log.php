<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Log extends Model
{
    //
    protected $fillable=[
        'user_id','logs_type_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
