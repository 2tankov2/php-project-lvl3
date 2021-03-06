@extends('layouts.app')

@section('title', 'Page Domain')

@section('analyzer')
<div class="container">
    <h3 class="display-6">Данные, введенного адреса веб-сайта:</h3>
    <hr/>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2" class="text-center text-uppercase font-italic">detailed page analysis</th>
            </tr>
        </thead>
        <tbody class="table-info">
            <tr>
                <th scope="row">Name</th>
                <td>
                    {{ $domain->name }}
                </td>
            </tr>
            <tr>
                <th scope="row">Updated</th>
                <td>
                    {{ $domain->updated_at }}
                </td>
            </tr>
            <tr>
                <th scope="row">Created</th>
                <td>
                    {{ $domain->created_at }}
                </td>
            </tr>
            <tr>
                <th scope="row">Status_Code</th>
                <td>
                    {{ $domain->status_code }}
                </td>
            </tr>
            <tr>
                <th scope="row">Content_Length</th>
                <td>
                    {{ $domain->content_length }}
                </td>
            </tr>
            <tr>
                <th scope="row">h1</th>
                <td>
                    {{ $domain->h1 }}
                </td>
            </tr>
            <tr>
                <th scope="row">keywords</th>
                <td>
                    {{ $domain->keywords }}
                </td>
            </tr>
            <tr>
                <th scope="row">description</th>
                <td>
                    {{ $domain->description }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
