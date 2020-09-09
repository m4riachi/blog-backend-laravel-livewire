<x-jet-confirmation-modal>
    <x-slot name="title">
        Delete
    </x-slot>
    <x-slot name="content">
        Do you realy want to delete this item?
    </x-slot>
    <x-slot name="footer">
        <x-jet-button type="button" class="bg-blue-600 mx-2" wire:click="delete">
            <x-heroicon-o-save width="26" class="mr-2"/> Delete
        </x-jet-button>
        <x-jet-button type="button" class="bg-red-600 mx-2" wire:click="resetForm">
            <x-heroicon-o-arrow-left width="26" class="mr-2"/> Cancel
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>
