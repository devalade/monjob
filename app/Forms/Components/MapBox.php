<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class MapBox extends Field
{
    protected string $view = 'forms.components.map-box';

    public function getMapBoxToken(): ?string {
        return env('MAPBOX_TOKEN');
    }

}
