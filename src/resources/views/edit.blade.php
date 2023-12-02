<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('todo.update', $todo) }}">
            @csrf
            @method('patch')
            <x-input-label for="todo" :value="__('Todo')" />
            <x-text-input id="todo" name="todo" type="text" class="mt-1 block w-full" :value="old('todo', $todo->todo)" required autofocus autocomplete="todo" />
            <x-input-error :messages="$errors->get('todo')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('todo.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>