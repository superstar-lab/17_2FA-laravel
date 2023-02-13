@extends('multiauth::layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Card</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('card-category.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $card_category->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rate:</strong>
                {{ $card_category->rate }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <div class="card ml-auto mr-auto" style="max-width: 360px">
                    <div class="card-header card-header-image">
                        <a href="{{asset('image/'.$card_category->image)}}">
                            <img class="img" src="{{asset('image/'.$card_category->image)}}" rel="nofollow">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
