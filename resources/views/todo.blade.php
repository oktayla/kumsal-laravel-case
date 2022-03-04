@extends('layouts.app')

@section('content')
    <div id="home">
        @include('components.filter')
        @include('components.search')

        @include('components.list')

        <div id="paginate">
            {!! $todos->links() !!}
        </div>
    </div>
@endsection