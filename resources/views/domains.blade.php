@extends('layouts.app')

@section('title', 'Page List')

@section('content')
    <h2 class="display-3">Мой первый проект на lumen с применением bootstrap.</h2>
    <div>
    <h3><a class="nav-link" href="/"><span class="badge badge-primary">Main page</span></a></h3>
    <h3><a class="nav-link" href={{ route('listDomains') }}><span class="badge badge-primary">Domains</span></a></h3>
    </div>
@endsection

@section('analyser')
<div class="container">
    <h3 class="display-5">Все адреса страниц</h3>
    <hr/>
    <div class="list-group">
        @foreach($domains->all() as $domain)
            <a class="list-group-item list-group-item-success" href={{ route('showDomain', ['id' => $domain['id']]) }}>{{ $domain['name'] }}</a>
        @endforeach
    </div>
    <div class="pagination">
        {{ $domains->links() }}
    </div>
</div>
@endsection
