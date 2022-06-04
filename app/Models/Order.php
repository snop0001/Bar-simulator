<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $attributes = [
        'ice' => 'regular',
        'alcohol_level' => 'regular',
        'allergies' => 0,
        'allergies_info' => null,
        'additional_instructions' => null,
    ];

    /**
     * Gets the pallet related to the order
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
