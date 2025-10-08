<x-base-layout>

    <x-header></x-header>

    <main class="container mx-auto">
        {{ $slot }}
    </main>

    <x-footer></x-footer>

</x-base-layout>