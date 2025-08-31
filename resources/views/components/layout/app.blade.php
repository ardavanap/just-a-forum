<x-layout.base :$title :$style>
    <x-layout.header />
    {{  $slot }}
    <x-layout.footer />
</x-layout.base>