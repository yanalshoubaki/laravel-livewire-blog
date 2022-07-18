@extends('layout')
@section('content')
    <div class="flex flex-col flex-col-reverse mx-auto settings-wrapper max-w-7xl md:flex-row">
        <div class="w-full settings-content">
            @yield('settings')
        </div>
    </div>
@endsection
