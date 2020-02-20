@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h2 class="display-6">Мой первый проект на lumen с применением bootstrap.</h2>
    <div>
    <h3><a class="nav-link" href="/"><span class="badge badge-primary">Main page</span></a></h3>
    <h3><a class="nav-link" href={{ route('domains') }}><span class="badge badge-primary">Domains</span></a></h3>
    </div>
@endsection

@section('analyser')
<div class="container">
    <h3 class="display-6">Введите адрес страницы</h3>
    <form class="form-inline my-2 my-lg-0" action={{ route('domains') }} method="post">
        <input class="form-control mr-sm-2" type="text" name="name" value="" placeholder="example.com">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Test</button>
    </form>
    <hr/>
    @if(isset($errors))
        <ul class="alert alert-danger">
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
