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

    public function Shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function invoiceTaxes()
    {
        return $this->hasMany(InvoiceTax::class);
    }
}
