<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mission extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $primaryKey = 'id';

    protected $guarded = [];

    protected $casts = [
      'resources' => 'array'
    ];

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_missions' , 'mission_id', 'user_id');
    }

    public function missionCategory(): BelongsTo
    {
        return $this->belongsTo(MissionCategory::class);
    }

    public function missionStatus(): BelongsTo
    {
        return $this->belongsTo(MissionStatus::class);
    }
}
