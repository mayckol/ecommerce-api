<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedstock extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'worker_service_id',
    ];

    public function workerService(): BelongsTo
    {
        return $this->belongsTo(WorkerService::class, 'worker_service_id');
    }
}
