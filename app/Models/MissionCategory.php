<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionCategory extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
