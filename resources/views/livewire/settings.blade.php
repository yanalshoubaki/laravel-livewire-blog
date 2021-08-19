@extends('layout')
@section('content')
    <div class="settings-wrapper flex flex-col flex-col-reverse mx-auto max-w-7xl md:flex-row">
        <x-settings-nav></x-settings-nav>
        <div class="settings-content w-full">
            @yield('settings')
        </div>
    </div>
@stop
