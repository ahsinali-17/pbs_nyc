<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSummarySettings extends Model
{
    //

    protected $table='user_summary_settings';
    protected $fillable =['user_id','sent_by','weekly','monthly','quarterly'];
}
