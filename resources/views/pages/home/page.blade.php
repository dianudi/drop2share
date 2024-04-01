@extends('templates.base')
@section('title', $page->title)
@section('metaDescription', $page->title)
@section('content')
<x-topbar />
<div class="container my-2">
    <div class="row">
        <div class="col">
            {!! $page->content !!}
        </div>
    </div>

</div>
<x-footer />
@endsection