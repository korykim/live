<!-- This example requires Tailwind CSS v2.0+ -->

<div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
    <table class="min-w-full divide-y  divide-cool-gray-200">
        <thead>
        <tr>
            {{$header}}
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-cool-gray-200">
        {{$body}}
        </tbody>
    </table>
</div>

