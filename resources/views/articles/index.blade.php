@extends('multiauth::layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card ">

            <div class="card-header card-header-primary">
                <a class="card-title text-center btn btn-rose" href="{{route('blogs.create')}}">New Blog</a>

                <div class="text-center">
                    <h1 class="text-center text-3xl my-8">Blogs</h1>
                </div>
            </div>

    @foreach ($articles as $article)
    <section class="card my-5 overflow-hidden">
        <h2 class="text-center mt-4"><a href="{{Route('blogs.show', $article->slug)}}">{{$article->title}}</a></h2>
        <p class="text-sm text-center leading-5 text-gray-700 mt-3">Posted {{\Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</p>
    </section>
    </div>
    @endforeach
    @endsection
