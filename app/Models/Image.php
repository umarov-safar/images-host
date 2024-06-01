<?php

namespace App\Models;

use App\Models\Scopes\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory,
        Sortable;

    protected $fillable = ['name'];
}
