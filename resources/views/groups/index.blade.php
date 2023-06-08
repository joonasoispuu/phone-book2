<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('groups.store') }}">
            @csrf
            <input type="text"
                name="Groups_Title"
                value="{{ old('Groups_Title') }}"
                placeholder="{{ __('Add a title for your group') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('Groups_Title')" class="mt-2" />

            <input type="text"
                name="Groups_Desc"
                value="{{ old('Groups_Desc') }}"
                placeholder="{{ __('Add a description for your group') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('Groups_Desc')" class="mt-2" />

            <label for="contacts" class="block mt-4 font-medium text-gray-700">{{ __('Add a Contact to Your Group') }}</label>
            <div class="relative inline-block w-full text-gray-700">
                <select name="contacts[]" id="contacts" multiple
                    class="block w-full px-4 py-2 pr-8 leading-tight bg-white border-gray-300 rounded-md shadow-sm focus:outline-none focus:bg-white focus:border-indigo-300">
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M9.707,5.293l3,3C12.898,8.488,13,8.744,13,9c0,0.256-0.102,0.512-0.293,0.707l-3,3 C9.512,12.898,9.256,13,9,13s-0.512-0.102-0.707-0.293l-3-3C5.102,9.512,5,9.256,5,9s0.102-0.512,0.293-0.707l3-3 C8.488,5.102,8.744,5,9,5S9.512,5.102,9.707,5.293z" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('contacts')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Add Group') }}</x-primary-button>
        </form>



        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">


            @foreach ($groups as $group)
    <div class="flex-1">
        <div class="flex justify-between items-center">
            <div>
                @unless ($group->created_at->eq($group->updated_at))
                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                @endunless
            </div>
            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('groups.add-contact', $group)">
                        {{ __('Add Contact') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('groups.edit', $group)">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('groups.destroy', $group) }}">
                        @csrf
                        @method('DELETE')
                        <x-dropdown-link :href="route('groups.destroy', $group)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div class="p-6 flex space-x-2">
        <div class="flex-1">
            <p class="mt-4 text-lg text-gray-900">Group Title: {{ $group->Groups_Title }}</p>
            <p class="mt-4 text-lg text-gray-900">Group Description: {{ $group->Groups_Desc }}</p>
            <h2 class="mt-4 text-lg text-gray-900">Contacts in this Group:</h2>
            @foreach ($group->contacts as $contact)
                <p class="mt-2 text-md text-gray-900">Contact's Name: {{ $contact->name }}</p>
                <p class="mt-2 text-md text-gray-900">Contact's Phone number: {{ $contact->phonenumber }}</p>
                <p class="mt-2 text-md text-gray-900">Contact's Description: {{ $contact->description }}</p>
                <p class="mt-2 text-md text-gray-900">Contact's {{ $contact->ContactType }} is {{ $contact->ContactValue }}</p>
            @endforeach
        </div>
    </div>
@endforeach

        </div>
    </div>
</x-app-layout>
