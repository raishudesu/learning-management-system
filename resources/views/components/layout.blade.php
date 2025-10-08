<x-base-layout>

    <x-header></x-header>

    <main class="container mx-auto flex-grow flex flex-col">
        {{ $slot }}
    </main>

    <x-footer></x-footer>

</x-base-layout>