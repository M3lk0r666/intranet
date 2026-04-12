<div class="flex item-center space-x-2">
    <x-wire-button href="{{ route('admin.clients.edit', $client) }}" blue xs>
        <i class="ri-edit-box-line"></i>
    </x-wire-button>

    <x-wire-button href="{{ route('admin.clients.show', $client) }}" green xs>
        <i class="ri-folder-add-line"></i>
    </x-wire-button>

    <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <i class="ri-delete-bin-2-line"></i>
        </x-wire-button>
    </form>

</div>
