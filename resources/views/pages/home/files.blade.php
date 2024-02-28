@extends('templates.base')
@section('title', $title)

@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="d-flex justify-content-between">
                <h1>{{$title}}</h1>
            </div>
            {{ $files->links() }}
            @if (!$files->isEmpty())
            <table class="table table-striped">
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <th scope="row">
                            <a class="text-decoration-none text-white"
                                href="{{route('showDetailFile', ['file' => $file->slug])}}">
                                <p class="m-0"><i class="bi bi-file-earmark"></i> {{$file->name}} @if($file->password)
                                    <i class="bi bi-lock text-warning"></i> @else @endif
                                </p>
                                <small>Size: {{formatBytes($file->size)}} Uploaded:
                                    {{$file->created_at->format('d-m-Y')}},
                                    Downloaded:
                                    {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <div>
                <p class="text-center fs-3">Currently, the files are not available.</p>
            </div>
            @endif

            {{ $files->links() }}
        </div>
    </div>
</div>
<x-footer />
@endsection