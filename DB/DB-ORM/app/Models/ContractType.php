<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;
    protected $table="contract_types";
    protected $primaryKey="id";
    protected $fillable =["name"];
    public $timestamps = false;
}
