<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('components.partials.head')

  <body>
    @include('components.partials.nav')

    {{ $slot }}

    @include('components.partials.bottom')
    @include('components.partials.script')

    @livewireScripts
  </body>
</html>
