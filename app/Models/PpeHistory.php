<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpeHistory extends Model
{
    use HasFactory;

    protected $table = 'ppe_edit_histories'; 
    protected $fillable = ['ppe_id', 'field_name', 'previous_value', 'updated_value', 'edited_at'];

    public $timestamps = false; // Since 'edited_at' is manually handled

    public function ppe()
    {
        return $this->belongsTo(Ppe::class, 'ppe_id');
    }

    
}
