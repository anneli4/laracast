<x-layout>
    <x-slot name="heading">
        Edit Job: {{ $job->title }}
    </x-slot>

    <!-- Update Form -->
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold text-gray-900">Update Job</h2>
                <p class="mt-1 text-sm text-gray-600">We need some updated details</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Title Field -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                placeholder="Shift Leader"
                                value="{{ old('title', $job->title) }}"
                                required
                                class="block w-full bg-white py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                    </div>

                    <!-- Salary Field -->
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                placeholder="$50,000 Per Year"
                                value="{{ old('salary', $job->salary) }}"
                                required
                                class="block w-full bg-white py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            />
                        </div>
                    </div>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mt-4">
                        <ul class="text-red-500 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <!-- Delete Button (submits hidden form) -->
            <div class="flex items-center gap-x-6">
                <button form="delete-form" type="submit" class="text-red-500 text-sm font-bold">Delete</button>
            </div>

            <!-- Cancel & Submit -->
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                    Update
                </button>
            </div>
        </div>
    </form>

    <!-- Hidden Delete Form -->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
