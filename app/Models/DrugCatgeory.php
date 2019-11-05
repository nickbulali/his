<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class DrugCatgeory extends Model
{
    protected $table = 'drug_categories';
    protected $fillable = ['description'];
}
