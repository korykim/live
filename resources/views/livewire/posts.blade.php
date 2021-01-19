<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Post') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex flex-wrap">

                <div class="p-2 flex-no-wrap">
                    <button wire:click="create()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New
                        Post
                    </button>

                    @if($isOpen)
                        @include('livewire.create')
                    @endif
                </div>

                <div class="w-4/5 p-2">

                    <input type="text"
                           class="form-control w-full bg-blue-50 focus:bg-white border-transparent focus:border-blue-400 py-2 px-4 rounded my-3 focus:outline-none focus:bg-white focus:shadow-outline"
                           placeholder="Search" wire:model="searchTerm"/>

                </div>

            </div>


{{--            <table class="table-fixed w-full">--}}
{{--                <thead>--}}
{{--                <tr class="bg-gray-100">--}}
{{--                    <th class="px-4 py-2 w-20"  >No.</th>--}}
{{--                    <th class="px-4 py-2"  >Title</th>--}}
{{--                    <th class="px-4 py-2"   >Body</th>--}}
{{--                    <th class="px-4 py-2"  >Time</th>--}}
{{--                    <th class="px-4 py-2"   >Action</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($posts as $post)--}}

{{--                    <tr>--}}
{{--                        <td class="border px-4 py-2" >{{ $post->id }}</td>--}}
{{--                        <td class="border px-4 py-2">{{ $post->title }}</td>--}}
{{--                        <td class="border px-4 py-2">{{ $post->body }}</td>--}}
{{--                        <td class="border px-4 py-2">{{ $post->created_at }}</td>--}}
{{--                        <td class="border px-4 py-2">--}}
{{--                            <button wire:click="edit({{ $post->id }})"--}}
{{--                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit--}}
{{--                            </button>--}}
{{--                            <button wire:click="delete({{ $post->id }})"--}}
{{--                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}

{{--                </tbody>--}}
{{--            </table>--}}


                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Body
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" >
                            <a href="#!" wire:click.prevent="sortBy('created_at')" class="flex-1">
                                Time
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <span class="sr-only">Action</span>
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $post->id }}
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $post->title }}</div>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $post->body }}</div>

                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $post->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $post->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                            </button>
                            <button wire:click="delete({{ $post->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete
                            </button>
                        </td>

                    </tr>

                    @endforeach
                    </tbody>
                </table>

            <div class="text-white font-bold py-2 px-4 rounded my-3">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>
