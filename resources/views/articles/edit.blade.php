@extends('multiauth::layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('blogs.update',$article->slug)}}">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">blog</i>
                    </div>
                    <h4 class="card-title">Edit  Blog</h4>
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
                        @method('PATCH')
                    <div class="row">
                        <label class="col-md-3 col-form-label">Online ?? </label>
                        <div class="col-md-9">
                            <select id="cardSelection" class="selectpicker" name="online" data-style="select-with-transition" title="Choose Card" data-size="7" required="true">
                                <option disabled> Select Online status?</option>

                                    <option value="0">NO </option>
                                    <option value="1">YES </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Meta Title</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input value="{{$article->title ?? old('title') }}" type="text" name="title" class="form-control" required="true">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Meta Description</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea name="meta_description" class="form-control" rows="5" required="true">{{$article->meta_description ?? old('meta_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Blog Image</label>
                        <div class="col-md-9 fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-filename"></div>
                            <div>
                                <span class="btn btn-raised btn-round btn-default btn-sm btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image" />
                                </span>
                                <a href="javascript:;" class="btn btn-danger btn-round btn-sm fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Blog Content</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea id="body" class="form-control" name="body" rows="4">{{$article->body_md ?? old('body')}}</textarea>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Blog Summary for Blog list page</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea id="summary" class="form-control" name="summary" rows="4">{{$article->summary_md ?? old('summary')}}</textarea>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="submit" name="submit" class="btn btn-fill btn-rose" value="Update Blog" />
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
        var summaryEditor = new SimpleMDE({ element: document.getElementById("summary") });
    </script>

@endsection
