<x-jet-dialog-modal>
    <x-slot name="title">
        Edit Category
    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="update">
            <x-jet-label value="Name"/>
            <x-jet-input wire:model.defer="category.name" class="w-full"/>
            <x-jet-input-error for="category.name"/>
        </form>
    </x-slot>
    <x-slot name="footer">
        <x-jet-button type="button" class="bg-blue-600 mx-2" wire:click="update">
            <x-heroicon-o-save width="26" class="mr-2"/> Save
        </x-jet-button>
        <x-jet-button type="button" class="bg-red-600 mx-2" wire:click="resetForm">
            <x-heroicon-o-arrow-left width="26" class="mr-2"/> Cancel
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
