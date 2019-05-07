<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class FamilyRelation extends Model
{
    protected $table = 'family_relations';
    protected $fillable = ['code_id','display','definition'];
    public $timestamps = false;
}
