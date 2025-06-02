<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotifySettings extends Model
{
    //
    protected $table='user_notify_settings';
    protected $fillable =['user_id','sent_by','dob','ecb','fdny','hpd','inspections','permits'];

}
