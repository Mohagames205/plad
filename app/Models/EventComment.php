<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event(): BelongsTo
    {
        return $this->belongsTo(CollectionEvent::class);
    }

}
