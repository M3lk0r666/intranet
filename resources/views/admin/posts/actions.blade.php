<div class="flex item-center space-x-2">
    <x-wire-button href="{{ route('admin.posts.edit', $post) }}" blue xs>
        <i class="ri-edit-box-line"></i>
    </x-wire-button>

    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <i class="ri-delete-bin-2-line"></i>
        </x-wire-button>
    </form>

</div>
