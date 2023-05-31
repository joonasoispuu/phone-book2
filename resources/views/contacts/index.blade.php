<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <input type="text"
                name="name"
                value="{{old("name")}}"
                placeholder="{{ __('Add a name for your contact') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>

            <input type="text"
                name="ContactType"
                value="{{old("ContactType")}}"
                placeholder="{{ __('Add your contact type') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>

            <input type="text"
                name="ContactValue"
                value="{{old("ContactValue")}}"
                placeholder="{{ __('Add your contact value') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"/>

            <textarea
                name="description"
                placeholder="{{ __('Give a description for your contact') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description') }}
            </textarea>
            </textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add contact') }}</x-primary-button>

        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y-3">
            @foreach ($contacts as $contact)
                <div class="flex-1">
                    <div>
                        <div class="ml-2 text-sm text-gray-600">
                            Name:<span class="text-gray-800">{{ $contact->name }}</span>
                        </div>
                        <div>
                            <small class="ml-2 text-sm text-gray-600">Duration:{{ $contact->duration->format('j M Y, g:i a') }}minutes.</small>
                        </div>
                        <div class="ml-2 text-sm text-gray">
                            <span class="text-gray-800">Base price:{{ $contact->name }}</span>
                        </div>
                    </div>

                    <p class="mt-4 text-lg text-gray-900">{{ $contact->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
