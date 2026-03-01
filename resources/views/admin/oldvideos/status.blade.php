<td>
    <!-- Mostrar "Trending" si está marcado como trending -->
    @if ((int) $row->is_trending === 1)
        <span class="badge badge-success">Trending</span>
    @endif

    <!-- Mostrar "Destacado" si está marcado como featured -->
    @if ((int) $row->is_featured === 1)
        <span class="badge badge-info">Destacado</span>
    @endif

    <!-- Mostrar el nivel de acceso (public, private, premium) -->
    <span class="badge badge-{{ 
        $row->access_level === 'public' ? 'success' : 
        ($row->access_level === 'premium' ? 'warning' : 'secondary') 
    }}">
        {{ ucfirst($row->access_level) }}
    </span>
</td>