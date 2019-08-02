<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'description', 'unit_price'
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->attributes['expense_code'].' - '.$this->attributes['description'];
    }

    public function ExpenseCategory()
    {
        return $this->belongsTo('App\Models\ExpensesCategory', 'expense_category_id', 'id');
    }
}
