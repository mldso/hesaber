<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{

    protected $guarded = ['id'];

    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }
}
