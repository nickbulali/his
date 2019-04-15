<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class DiagnosticTests extends Model
{
    protected $table = 'diagnostic_tests';
    protected $fillable = ['encounter_id'];
}
