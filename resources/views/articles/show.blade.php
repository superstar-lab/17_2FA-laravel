@extends('multiauth::layouts.app')

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <div class="text-left pb-4 px-5 mt-4">
                <a class="text-sm leading-5 text-gray-700 hover:underline" href="{{ url()->previous() }}">Back to blog</a>
            </div>
            <a href="{{ route('blogs.edit',$article->slug) }}" rel="tooltip" data-placement="left" title="Edit Blog" class="btn btn-info" style="padding-top: 2px;padding-bottom: 2px">
                Edit
            </a>
            <form class="d-inline-block" action="{{ route('blogs.destroy',$article->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" rel="tooltip" data-placement="left" title="Remove Blog" class="btn btn-danger d-inline-block">
                    Delete
                </button>
            </form>
        </div>
            <div class="card-body px-5">
                <h1 class="text-5xl text-center ">{{$article->title}}</h1>
                <p class="text-sm text-center leading-5 text-gray-700 mt-3">Posted {{\Carbon\Carbon::parse($article->updated_at)->format('d/m/Y')}}</p>
                <article class="markdown-body">
                    {!! $article->body_html !!}
                </article>
            </div>

    </div>
@endsection
