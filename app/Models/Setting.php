<?php

namespace App\Models;

use App\Http\Traits\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, UploadFile;

    protected $fillable = ['key', 'value'];
}
