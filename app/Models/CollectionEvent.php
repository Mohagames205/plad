<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CollectionEvent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comment(): HasOne
    {
        return $this->hasOne(EventComment::class, 'collection_event_id');
    }

    public function moneyValidation(): HasOne
    {
        return $this->hasOne(MoneyValidation::class, 'collection_event_id');
    }


    public function productValidation(): HasOne
    {
        return $this->hasOne(ProductValidation::class, 'collection_event_id');
    }
}
