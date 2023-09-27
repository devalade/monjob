<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionStatus extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
}
