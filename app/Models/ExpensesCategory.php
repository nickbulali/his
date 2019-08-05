<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    protected $table = 'expense_categories';

    public function item()
    {
        return $this->hasMany('App\Models\Expenses','id','expense_categories_id');
    }
    
}
