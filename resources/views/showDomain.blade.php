@extends('layouts.app')

@section('title', 'Page Domain')

@section('content')
    <h2 class="display-3">Мой первый проект на lumen с применением bootstrap.</h2>
    <div>
    <h3><a class="nav-link" href="/"><span class="badge badge-primary">Main page</span></a></h3>
    <h3><a class="nav-link" href={{ route('listDomains') }}><span class="badge badge-primary">Domains</span></a></h3>
    </div>
@endsection

@section('analyser')
<div class="container">
    <h3 class="display-5">Данные введенного адреса веб-сайта:</h3>
    <hr/>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Updated</th>
                <th scope="col">Created</th>
                <th scope="col">Status_Code</th>
                <th scope="col">Content_Length</th>
            </tr>
        </thead>
        {{ var_dump($domain) }}
        <tbody>
            <tr>
                <td>
                    {{ $domain['id'] }}
                </td>
                <td>
                    {{ $domain['name'] }}
                </td>
                <td>
                    {{ $domain['updated_at'] }}
                </td>
                <td>
                    {{ $domain['created_at'] }}
                </td>
                <td>
                    {{ $domain['status_code'] }}
                </td>
                <td>
                    {{ $domain['content_length'] }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
