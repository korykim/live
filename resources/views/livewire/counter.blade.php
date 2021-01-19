<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Counter') }}
    </h2>
</x-slot>



<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
{{--                        <div style="text-align: center">--}}
{{--                            <button wire:click="increment"--}}
{{--                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+--}}
{{--                            </button>--}}
{{--                            <h1>{{ $count }}</h1>--}}
{{--                            <button wire:click="decrement"--}}
{{--                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">---}}
{{--                            </button>--}}
{{--                        </div>--}}

            @livewire('users-table-view')

        </div>
    </div>
</div>
