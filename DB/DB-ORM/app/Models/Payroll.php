<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table="payrolls";
    protected $primaryKey="id";
    protected $fillable =["initial_date","final_date","user_id","salary","status"];
    public $timestamps = false;
}
