<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class DrugCatgeories extends Model
{
    protected $table = 'drug_categories';
    protected $fillable = ['description'];
}
