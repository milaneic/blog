<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public function getNameType($id)
    {
        return DB::table('logs_types')->find($id)->name;
    }
}
