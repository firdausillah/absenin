@extends('layouts/adminbase')

@section('body')
    
    <x-adminsidebar></x-adminsidebar>
    <x-navbar></x-navbar>
    @yield('content')   

@endsection