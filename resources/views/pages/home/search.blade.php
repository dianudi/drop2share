@extends('templates.base')
@section('title', "Search $query")
@section('content')
<x-topbar />
<div class="container mt-2">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="d-block d-lg-flex justify-content-between">
                <h1>Search Files</h1>
                <div class="form mb-3 flex-grow-1 mx-auto mx-lg-1 my-auto" style="max-width: 400px">
                    <form action="{{route('search')}}" method="get">
                        <div class="d-flex">
                            <input type="text" class="form-control form-control-sm" id="floatingInput"
                                value="{{$query}}" name="q" placeholder="Search Files...">
                            <button class="btn btn-primary  ms-1"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
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
                                <small>
                                    {{formatBytes($file->size)}} /
                                    {{$file->created_at->format('d M Y')}} /
                                    <i class="bi bi-download"></i>
                                    {{formatNumberInKNotation($file->total_download)}}</small>
                            </a>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <div>
                <p class="text-center fs-3">Oops, Files not found, try something else.</p>
            </div>
            @endif

            {{ $files->links() }}
        </div>
    </div>
</div>
<x-footer />
@endsection