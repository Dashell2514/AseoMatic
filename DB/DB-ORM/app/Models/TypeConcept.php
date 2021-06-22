<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConcept extends Model
{
    use HasFactory;
    protected $table="types_concepts";
    protected $primaryKey="id";
    protected $fillable =["name"];
    public $timestamps = false;
}
