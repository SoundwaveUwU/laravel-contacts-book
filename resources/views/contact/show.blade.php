<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $contact->full_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $contact->full_name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Карточка контакта.</p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('Full name') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $contact->full_name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('Phone') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $contact->phone }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">{{ __('Is favorite?') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <input
                                    id="is_favorite"
                                    type="checkbox"
                                    readonly
                                    disabled
                                    @if ($contact->is_favorite) checked="checked" @endif
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-4 space-x-2">
                <x-button tag="a"
                          :href="route('contact.index')"
                          class="!bg-gray-200 !text-gray-900">{{ __('Back to list') }}</x-button>
                <x-button tag="a" :href="route('contact.edit', $contact)">{{ __('Edit') }}</x-button>
            </div>
        </div>
    </div>
</x-app-layout>

