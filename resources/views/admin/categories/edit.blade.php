<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $category->name }}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                            <div>
                                <img class="w-32 h-32" src="{{ Storage::url($category->image) }}">
                            </div>
                            <div class="mt-1">
                                <input type="file" id="image" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('image')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="description" rows="3" name="description"
                                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                 {{ $category->description }}
                                </textarea>
                            </div>
                            @error('description')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Menu index for category --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full bg-gray-800 text-gray-300 rounded-lg shadow-md"
                                id="sortable-table">
                                <thead class="bg-gray-700 text-gray-400">
                                    <tr>
                                        <th class="py-3 px-3 text-left uppercase tracking-wider">#</th>
                                        <th class="py-3 px-6 text-left uppercase tracking-wider">Name</th>
                                        <th class="py-3 px-6 text-left uppercase tracking-wider">Image</th>
                                        <th class="py-3 px-6 text-left uppercase tracking-wider">Price</th>
                                        <th class="py-3 px-6 text-center uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr class="border-b border-gray-700" data-id="{{ $menu->id }}">
                                            <td class="py-4 px-3">
                                                <span class="drag-handle cursor-move ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <rect x="3" y="4" width="14" height="2" rx="1">
                                                        </rect>
                                                        <rect x="3" y="8" width="14" height="2" rx="1">
                                                        </rect>
                                                        <rect x="3" y="12" width="14" height="2" rx="1">
                                                        </rect>
                                                        <rect x="3" y="16" width="14" height="2" rx="1">
                                                        </rect>
                                                    </svg>

                                                </span>
                                            </td>

                                            <td class="py-4 px-6">{{ $menu->name }}</td>
                                            <td class="py-4 px-6">
                                                <img src="{{ Storage::url($menu->image) }}"
                                                    class="w-16 h-16 rounded bg-gray-600">
                                            </td>
                                            <td class="py-4 px-6">{{ number_format($menu->price, 2) }}</td>
                                            <td class="py-4 px-6 text-center">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                                    <form method="POST"
                                                        action="{{ route('admin.menus.destroy', $menu->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Add item</a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const table = document.getElementById('sortable-table');

            new Sortable(table.querySelector('tbody'), {
                animation: 150,
                handle: '.drag-handle', // Restrict dragging to the drag icon
                onEnd: async (evt) => {
                    const rows = Array.from(table.querySelectorAll('tbody tr'));
                    const order = rows.map((row, index) => ({
                        id: row.dataset.id,
                        order: index + 1
                    }));

                    try {
                        const response = await fetch('{{ route('admin.menus.updateOrder') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                order
                            }),
                        });

                        if (!response.ok) {
                            alert('Failed to update order');
                        }
                    } catch (error) {
                        alert('Failed to update order');
                    }
                },
            });
        });
    </script>
</x-admin-layout>
