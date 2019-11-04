<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Drug extends Model
{
    protected $table = 'drugs';
    protected $fillable = ['generic_name','trade_name','strength_value','strength_unit','dosage_form','administration_route','price'];
    public $timestamps = false;
}
