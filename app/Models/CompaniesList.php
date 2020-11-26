<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompaniesList extends Model
{
    use HasFactory;
    protected $fillable=['name', 'email', 'logo', 'website'];
    public $timestamps=false;
    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
