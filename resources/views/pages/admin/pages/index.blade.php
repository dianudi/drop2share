@extends('templates.base')
@section('title', 'Site Page Manager')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <div class="my-1 d-flex justify-content-between">
        <h3>Site Pages</h3>
        <a href="{{route('pages.create')}}" class="text-decoration-none btn btn-outline-primary"><i
                class="bi bi-file-plus">
                New</i></a>
    </div>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)

            <tr>
                <th scope="row">{{ ($pages ->currentpage()-1) * $pages ->perpage() + $loop->index + 1 }}</th>
                <td><a href="{{route('page.show', ['page' => $page->slug])}}"
                        class="text-decoration-none">{{$page->title}}</a></td>
                <td>{{$page->slug}}</td>
                <td>{{$page->created_at->format('d-m-Y')}}</td>
                <td class="d-flex">
                    <a href="{{route('pages.edit', ['page' => $page->slug])}}" class="me-2 btn btn-sm btn-success"><i
                            class="bi bi-pencil"></i></a>
                    <form action="{{route('pages.destroy', ['page' => $page->slug])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $pages->links() }}

</div>
<x-footer />
@endsection