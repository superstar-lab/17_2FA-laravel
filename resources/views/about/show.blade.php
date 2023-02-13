@extends('multiauth::layouts.app')

@section('content')
    <div class="card">
            <div class="card-body px-5">
                <div class="card-header card-header-rose">
                    <a class="card-title text-center btn btn-primary" href="{{route('about.edit')}}">Edit Page</a>
                    <h3 class="text-center ">About Page</h3>
                </div>

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
                <article class="card-body markdown-body">
                    {!! $article->body_html !!}
                </article>
            </div>
    </div>
@endsection
