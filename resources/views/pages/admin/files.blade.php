@extends('templates.base')
@section('title', 'Admin File Manager')
@section('content')
<x-topbar />
<div class="container">
    <x-admin-navbar />
    <div class="row my-2 border-bottom">
        <div class="col d-lg-flex justify-content-between align-items-center">
            <div class="d-flex text-center justify-content-center">
                <p>Total Files: <span
                        class="btn btn-sm btn-primary px-4">{{formatNumberInKNotation($totalFiles)}}</span></p>
                <p class="mx-2">Total Downloaded: <span
                        class="btn btn-sm btn-warning px-4">{{formatNumberInKNotation($totalDownloaded)}}</span></p>
                <p>Total Sizes: <span class="btn btn-sm btn-success">{{formatBytes($totalSizes)}}</span></p>
            </div>
            <form action="{{route('admin.files')}}" method="get">
                <div class="input-group mb-3">
                    @if ($q)
                    <span class="me-2 my-auto">
                        Search For
                    </span>
                    @endif
                    <input type="text" name="q" value="{{$q}}" class="form-control" placeholder="Search Files"
                        aria-label="Search files" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>

            </form>
        </div>
    </div>
    <table class="table table-striped">
        <tbody>
            @foreach ($files as $file)
            <tr>
                <th scope="row" class="d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none text-white"
                        href="{{route('admin.files.detail', ['file' => $file->slug])}}">
                        <p class="m-0 text-break"><i class="bi bi-file-earmark"></i>
                            {{str($file->name)->limit(60)}}
                            @if($file->password)
                            <i class="bi bi-lock text-warning"></i> @else @endif
                        </p>
                        <small>{{formatBytes($file->size)}} /
                            {{$file->created_at->format('d M Y')}} /
                            <i class="bi bi-download"></i>
                            {{formatNumberInKNotation($file->total_download)}} / <i class="bi bi-person"></i>
                            {{$file->user->name}}@if ($file->delete_at)
                            / <i class="bi bi-trash"></i> <i class="bi bi-clock"></i> {{$file->delete_at}}
                            @endif</small>
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
@endsection