<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div>
                <x-button tag="a" :href="route('contact.create')" class="!bg-gray-200 !text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                              clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">{{ __('Create') }}</span>
                </x-button>
            </div>

            <div>
                {{ $contacts->links() }}
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2">{{ __('Full name') }}</th>
                                <th class="p-2">{{ __('Phone') }}</th>
                                <th class="p-2 min-w-0 w-40">{{ __('Is favorite?') }}</th>
                                <th class="p-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="p-2 truncate"><a class="text-indigo-700 underline hover:no-underline"
                                                                href="{{ route('contact.show', $contact) }}">{{ $contact->full_name }}</a>
                                    </td>
                                    <td class="p-2 truncate"><a class="text-indigo-700 underline hover:no-underline"
                                                                href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                    </td>
                                    <td class="p-2 text-center min-w-0 w-0">
                                        <input
                                            id="is_favorite"
                                            type="checkbox"
                                            readonly
                                            disabled
                                            @if ($contact->is_favorite) checked="checked" @endif
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </td>
                                    <td class="p-2 truncate text-right">
                                        <form action="{{ route('contact.destroy', $contact) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <x-button type="submit" class="bg-red-700 px-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-4 w-4"
                                                     viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                          clip-rule="evenodd" />
                                                </svg>
                                            </x-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
