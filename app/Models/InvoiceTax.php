<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTax extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the taxes that owns the InvoiceTax
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxes()
    {
        return $this->belongsTo(Tax::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
