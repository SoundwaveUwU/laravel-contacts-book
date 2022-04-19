<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing a contact') }} "{{ $contact->full_name }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form
                action="{{ route('contact.update', $contact) }}"
                method="post"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                @method('put')

                <div class="p-6 bg-white border-b border-gray-200 space-y-4">
                    <h1>{{ __('Editing a contact') }} "{{ $contact->full_name }}"</h1>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="flex w-full space-x-2">

                        <!-- First name -->
                        <div class="w-1/3">
                            <x-label for="first_name" :value="__('First name')" />

                            <x-input
                                id="first_name"
                                class="block mt-1 w-full"
                                type="text"
                                name="first_name"
                                :value="old('first_name', $contact->first_name)"
                                required />
                        </div>

                        <!-- Last name -->
                        <div class="w-1/3">
                            <x-label for="last_name" :value="__('Last name')" />

                            <x-input
                                id="last_name"
                                class="block mt-1 w-full"
                                type="text"
                                name="last_name"
                                :value="old('last_name', $contact->last_name)"
                                required />
                        </div>

                        <!-- Patronymic -->
                        <div class="w-1/3">
                            <x-label for="patronymic" :value="__('Patronymic')" />

                            <x-input
                                id="patronymic"
                                class="block mt-1 w-full"
                                type="text"
                                name="patronymic"
                                :value="old('patronymic', $contact->patronymic)" />
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-label for="phone" :value="__('Phone')" />

                        <x-input
                            id="phone"
                            class="block mt-1 w-full"
                            type="tel"
                            name="phone"
                            required
                            :value="old('phone', $contact->phone)" />
                    </div>

                    <!-- Favorite -->
                    <div class="block mt-4">
                        <label for="is_favorite" class="inline-flex items-center">
                            <input
                                id="is_favorite"
                                type="checkbox"
                                value="1"
                                @if (old('is_favorite', $contact->is_favorite)) checked="checked" @endif
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="is_favorite">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Is favorite?') }}</span>
                        </label>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <x-button type="submit">{{ __('Save') }}</x-button>
                </div>
            </form>

            <div class="mt-4 space-x-2">
                <x-button tag="a"
                          :href="route('contact.index')"
                          class="!bg-gray-200 !text-gray-900">{{ __('Back to list') }}</x-button>
                <x-button tag="a" :href="route('contact.show', $contact)">{{ __('Show') }}</x-button>
            </div>
        </div>
    </div>
</x-app-layout>
