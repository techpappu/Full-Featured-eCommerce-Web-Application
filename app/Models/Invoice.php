<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the invoiceItems invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function invoiceTaxes()
    {
        return $this->hasMany(InvoiceTax::class);
    }

    /**
     * Get the discount that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    /**
     * Get the user that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
