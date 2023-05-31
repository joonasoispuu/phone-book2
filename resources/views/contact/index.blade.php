<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('contact.store') }}">
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
    </div>
</x-app-layout>
