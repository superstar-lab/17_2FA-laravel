@extends('multiauth::layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('trade.update')}}">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">globe</i>
                    </div>
                    <h4 class="card-title">Edit How to Trade Page</h4>
                </div>

                <div class="card-body mt-4">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (\Session::has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{!! \Session::get('success') !!}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @csrf



                    <div class="row">
                        <label class="col-md-3 col-form-label">About Page Content</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea id="body" class="form-control" name="body" rows="4">{{$article->body_md ?? old('body')}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="submit" name="submit" class="btn btn-fill btn-rose" value="Update" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>





    {{-- Import CSS and JS for SimpleMDE editor --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
        // Initialise editors
        var bodyEditor = new SimpleMDE({ element: document.getElementById("body") });
    </script>

@endsection
