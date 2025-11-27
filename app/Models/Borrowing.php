<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_code',
        'user_id',
        'item_id',
        'quantity',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
        'purpose',
        'notes',
        'item_condition_borrow',
        'item_condition_return',
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'due_date' => 'date',
        'return_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function isOverdue()
    {
        if ($this->status === 'dikembalikan') {
            return false;
        }
        return Carbon::now()->isAfter($this->due_date);
    }

    public function getDaysOverdue()
    {
        if (!$this->isOverdue()) {
            return 0;
        }
        return Carbon::now()->diffInDays($this->due_date);
    }
}
