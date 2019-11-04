<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockIssueRecord extends Model
{
	protected $table = 'stocks_issue_records';

    public $fillable = ['stock_id', 'quantity_issued', 'date_issued', 'requested_by', 'issued_by', 'received_by', 'remarks'];

    public $timestamps = true;


}