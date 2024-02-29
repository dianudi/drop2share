@extends('templates.base')
@section('title', 'My Files')

@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="d-flex justify-content-between">
                <h1>My Files</h1>
                <a class="btn btn-primary rounded my-2" href="{{route('my-files.create')}}"><i class="bi bi-plus"></i><i
                        class="bi bi-upload"></i></a>
            </div>
            <div class="d-flex justify-content-between fs-5">
                <p>Files: <span class="badge text-bg-primary">{{$context->total_files}}</span></p>
                <p>Sizes: <span class="badge text-bg-success">{{formatBytes($context->total_size)}}</span></p>
                <p>Downloaded: <span
                        class="badge text-bg-info">{{formatNumberInKNotation($context->total_download)}}</span></p>
            </div>
            {{ $files->links() }}
            <table class="table table-striped">
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <th scope="row" class="d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none text-white"
                                href="{{route('my-files.show', ['file' => $file->slug])}}">
                                <p class="m-0 text-break"><i class="bi bi-file-earmark"></i> {{$file->name}}
                                    @if($file->password)
                                    <i class="bi bi-lock text-warning"></i> @else @endif
                                </p>
                                <small>{{formatBytes($file->size)}} /
                                    {{$file->created_at->format('d M Y')}} /
                                    <i class="bi bi-download"></i>
                                    {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                            <form action="{{route('my-files.destroy', ['file' => $file->slug])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $files->links() }}
        </div>
    </div>
</div>
<x-footer />
@endsection