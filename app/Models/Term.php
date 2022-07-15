<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $table = 'terms';
    protected $guarded = [];

    protected $primaryKey = 'id';

    public function getTermAttribute($value)
    {
        return ucfirst($value);
    }

}
