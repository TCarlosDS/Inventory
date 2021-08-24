@extends('layout')
@section('title','Marcas')
@section('encabezado','Lista Marcas')
@section('content')
<a href="{{ route('brandNew') }}"class="btn btn-primary">Nueva Marca</a>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message')}}
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th></th>
        </tr>
</thead>
<tbody>
@foreach($brandsList as $brand)
        <tr>
            <td>{{ $brand->name}}</td>
            <td>
                <a href="{{ route('brandNew',['id'=>$brand->id]) }}"" class="btn btn-warning">Editar</a>
                <a href="/brand/delete/{{$brand->id}}" class="btn btn-danger">Borrar</a>                
            </td>
        </tr>
@endforeach
</tbody>
</table>
@endsection