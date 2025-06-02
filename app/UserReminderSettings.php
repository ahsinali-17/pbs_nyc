<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReminderSettings extends Model
{
    //
    protected $table='user_reminder_settings';
    protected $fillable =['user_id','sent_by','dob','ecb','fdny','hpd','inspections','permits'];
}
