<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'worker_service_id',
        'rate',
    ];

    public $timestamps = true;

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function workerService(): BelongsTo
    {
        return $this->belongsTo(WorkerService::class, 'worker_service_id');
    }
}
