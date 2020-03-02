@extends('layouts.app')

@section('title', 'Page List')

@section('analyzer')
<div class="container">
    <h3 class="display-6">Весь список, проверенных адресов:</h3>
    <hr/>
    <div class="list-group">
        @foreach($domains as $domain)
            <a class="list-group-item list-group-item-success" href={{ route('domain.show', ['id' => $domain->id]) }}>{{ $domain['name'] }}</a>
        @endforeach
    </div>
    <div class="pagination">
        {{ $domains->links() }}
    </div>
</div>
@endsection
