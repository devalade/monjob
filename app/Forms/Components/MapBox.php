<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class MapBox extends Field
{
    protected string $view = 'forms.components.map-box';

    protected int|\Closure $zoom = 9;

    public function zoom(int | \Closure | null $zoom): static
    {
        $this->zoom = $zoom;
        return $this;
    }

    public function getZoom(): int
    {
        return $this->evaluate($this->zoom);
    }

}
