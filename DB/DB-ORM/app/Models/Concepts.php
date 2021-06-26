<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepts extends Model
{
    use HasFactory;
    protected $table="concepts";
    protected $primaryKey="id";
    protected $fillable =["description","status","value","concepts_id","payroll_id","accounting_entry_id"];
    public $timestamps = false;
}
