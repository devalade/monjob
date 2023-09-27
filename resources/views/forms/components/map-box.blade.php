<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>

    <div
        x-ignore
        ax-load
        x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('map-box'))]"
        ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('map-box') }}"
        x-data="mapBox({
        state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }},
    })"

        x-init="
            $refs.map.className = 'absolute top-0 bottom-0 w-full rounded-xl';
            mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2YWxhZGUiLCJhIjoiY2xteGpvbDFhMHRtejJ1bTI5MHFtdXdlcSJ9.cClJLbMF9F4-j2LiyJ2SFg';
            const map = new mapboxgl.Map({
                container: $refs.map, // container ID
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/streets-v12', // style URL
                center: [-74.5, 40], // starting position [lng, lat]
                zoom: 9 // starting zoom
            });
        "

        class="w-96 h-96 relative rounded"
    >
        <div x-ref="map"></div>
    </div>

</x-dynamic-component>
