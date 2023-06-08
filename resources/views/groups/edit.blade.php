<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('groups.update', $group) }}">
            @csrf
            @method('PUT')

            <label for="Groups_Title" class="block font-medium text-gray-700">{{ __('Group Title') }}</label>
            <input type="text"
                name="Groups_Title"
                value="{{ old('Groups_Title', $group->Groups_Title) }}"
                placeholder="{{ __('Add a title for your group') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('Groups_Title')" class="mt-2" />

            <label for="Groups_Desc" class="block mt-4 font-medium text-gray-700">{{ __('Group Description') }}</label>
            <input type="text"
                name="Groups_Desc"
                value="{{ old('Groups_Desc', $group->Groups_Desc) }}"
                placeholder="{{ __('Add a description for your group') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('Groups_Desc')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Update Group') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
