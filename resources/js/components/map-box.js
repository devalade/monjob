import 'mapbox-gl/dist/mapbox-gl.css';
import mapboxgl from 'mapbox-gl';

export default function mapBox({
      state,
  }) {
    return {
        state,
        mapboxgl
    }
}
