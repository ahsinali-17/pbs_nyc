<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherInspections extends Model
{

    public $reminderSubject = "Inspection Status Reminder";

    protected $table = 'other_inspections';

    protected $fillable = ['property_id', 'type', 'status', 'content', 'due_date', 'alert_date', 'last_alert_date'];

    protected $casts = [
        'due_date' => 'datetime',
        'alert_date' => 'datetime',
        'last_alert_date' => 'datetime'
    ];

    protected $dateFormat = 'Y-m-d';

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
