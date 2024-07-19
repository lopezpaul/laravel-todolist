<?php

use function Livewire\Volt\{mount, rules, state};

state(['todo', 'message']);

rules(['message' => 'required|string|max:255']);

mount(fn () => $this->message = $this->todo->message);

$update = function () {
    $this->authorize('update', $this->todo);

    $validated = $this->validate();

    $this->todo->update($validated);

    $this->dispatch('todo-updated');
};

$cancel = fn () => $this->dispatch('todo-edit-canceled');

?>

<div>
    <form wire:submit="update">
        <textarea
            wire:model="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form
</div>
