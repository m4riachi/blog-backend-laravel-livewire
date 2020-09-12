<x-jet-dialog-modal maxWidth="6xl">
    <x-slot name="title">
        New Post
    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="store">
            <x-jet-label value="Category"/>
            <select wire:model.defer="post.category_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="">-- Choose Category --</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="post.category_id"/>


            <x-jet-label value="Title" class="mt-3"/>
            <x-jet-input wire:model.debounce.250ms="post.title" class="w-full"/>
            <x-jet-input-error for="post.title"/>

            <x-jet-label value="Slug" class="mt-3"/>
            <x-jet-input wire:model.defer="post.slug" class="w-full"/>
            <x-jet-input-error for="post.slug"/>

            <x-jet-label value="Image" class="mt-3"/>
            <x-jet-input wire:model="image" class="w-full" type="file"/>
            <x-jet-input-error for="image"/>

            <x-jet-label value="Content" class="mt-3"/>
            <textarea id="content" class="resize w-full h-48 border rounded focus:outline-none focus:shadow-outline" wire:model.defer="post.content">alksjd alsjdk lasjd</textarea>
            <x-jet-input-error for="post.content"/>

            <x-jet-label class="mt-3">
                Activate this post&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" wire:model.defer="post.active" value="1">
            </x-jet-label>

        </form>
    </x-slot>
    <x-slot name="footer">
        <x-jet-button type="button" class="bg-blue-600 mx-2" wire:click="store">
            <x-heroicon-o-save width="26" class="mr-2"/> Save
        </x-jet-button>
        <x-jet-button type="button" class="bg-red-600 mx-2" wire:click="resetForm">
            <x-heroicon-o-arrow-left width="26" class="mr-2"/> Cancel
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
