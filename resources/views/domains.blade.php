@extends('index')

@section('title', 'Page List')

@section('analyser')
<div class="container">
    <h3 class="display-5">Все адреса страниц</h3>
    <hr/>
    @foreach($domains as $domain)
        <p>{{ $domain['name'] }}</p>
    @endforeach
</div>
@endsection
