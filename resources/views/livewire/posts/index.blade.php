<div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <x-jet-button type="button" class="bg-green-600" wire:click="setMode('add')">
            <x-heroicon-o-plus width="26" /> Add Post
        </x-jet-button>
    </div>

    @if ($mode['edit'])
        @include('livewire.posts.edit')
    @elseif($mode['add'])
        @include('livewire.posts.create')
    @elseif($mode['delete'])
        @include('livewire.posts.delete')
    @endif
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <x-jet-action-message on="saved" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-5 rounded relative">
            successful operation
        </x-jet-action-message>

        <x-jet-input placeholder="Search" wire:model.debounce.250ms="search" />

        <table class="table-fixed w-full mb-2">
            <thead>
            <tr>
                <th class="w-1/6 px-4 py-2">Category</th>
                <th class="w-4/6 px-4 py-2">Name</th>
                <th class="w-1/6 px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($collection as $item)
                <tr class="{{$loop->odd ? '' : 'bg-gray-100'}}">
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2">{{ $item->title }}</td>
                    <td class="border px-4 py-2" align="center">
                        <x-jet-button type="button" class="bg-yellow-400" wire:click="setMode('edit', {{$item->id}})">
                            <x-heroicon-o-pencil-alt width="26" />
                        </x-jet-button>

                        <x-jet-button type="button" class="bg-red-600" wire:click="setMode('delete', {{$item->id}})">
                            <x-heroicon-o-trash width="26" />
                        </x-jet-button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $collection->links('vendor.pagination.tailwind') }}
    </div>
</div>
