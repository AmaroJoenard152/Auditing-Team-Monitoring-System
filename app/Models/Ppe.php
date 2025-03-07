<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppe extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $table = 'ppes'; // This should refer to the PPE table

    protected $fillable = [
        'division', 'user', 'property_type', 'article_item', 'description',
        'old_pn', 'new_pn', 'unit_meas', 'unit_value', 'quantity_property',
        'quantity_physical', 'location', 'condition', 'status', 'remarks', 'date_acq'
    ];

    public function editHistory()
    {
        return $this->hasMany(PpeHistory::class, 'ppe_id');
    }

    public static function boot()
    {
        parent::boot();
    
        static::updating(function ($ppe) {
            $original = $ppe->getOriginal();
    
            foreach ($ppe->getDirty() as $field => $newValue) {
                PpeHistory::create([
                    'ppe_id' => $ppe->id,
                    'field_name' => $field,
                    'previous_value' => array_key_exists($field, $original) ? $original[$field] : null,
                    'updated_value' => $newValue,
                    'edited_at' => now()->timezone('Asia/Manila')->format('Y-m-d H:i:s'),  // ✅ Store accurate PHT
                ]);
            }
        });
    }
    
    
    
}
