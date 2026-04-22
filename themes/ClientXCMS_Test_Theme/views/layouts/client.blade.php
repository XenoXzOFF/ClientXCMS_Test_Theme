@extends('layouts.front')
@section('content')
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 bg-light sidebar p-4 shadow-sm">Menu Client</nav>
        <main class="col-md-9 p-4">@yield('client_content')</main>
    </div>
</div>
@endsection
