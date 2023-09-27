<?php

namespace App\Filament\Resources\MissionResource\Pages;

use App\Filament\Resources\MissionResource;
use App\Filament\Resources\ParticipantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class Participants extends ListRecords
{
    protected static string $resource = ParticipantResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Participants';
    }

    /**
     * @return string|Htmlable
     */
    public function getHeading(): string|Htmlable
    {
        return 'Participants';
    }


}
