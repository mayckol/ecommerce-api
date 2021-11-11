<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchedulingService extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'worker_id',
        'available_day',
        'start_at',
        'end_at',
        'is_available',
    ];

    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'available_day'];

    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
