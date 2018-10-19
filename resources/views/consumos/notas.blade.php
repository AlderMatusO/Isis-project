@extends('layouts.app')


@section('scripts')
    <script src="{{ asset('js/consumos.js') }}" defer></script>
@endsection
@section('content')
<div id="consumos" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <consumos-component></consumos-component>
        </div>
    </div>
</div>
@endsection