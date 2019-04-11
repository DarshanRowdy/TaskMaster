<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function user(){
        return $this->belongsTo('App/Users');
    }

    public function assignedBy(){
        return $this->belongsTo('App/Users', 'assigned_by');
    }

    public function itemUnit(){
        return $this->belongsTo('App/ItemUnits');
    }
}
