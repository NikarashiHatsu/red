<div class="flex">
    <a href="{{ route('admin.master.pricing_plan.edit', $id) }}" class="mr-2">
        <x-blue-button>
            <i class="fas fa-edit mr-1"></i>
            <span>
                Edit
            </span>
        </x-blue-button>
    </a>
    <form action="{{ route('admin.master.pricing_plan.destroy', $id) }}" method="post">
        @csrf
        @method('DELETE')
        <x-red-button type="button" onclick="confirmDeletion(event)">
            <i class="fas fa-trash mr-1"></i>
            <span>
                Hapus
            </span>
        </x-red-button>
    </form>
</div>