@extends('multiauth::layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card py-5 justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8 margin-tb">
                        <div class="pull-left">
                            <h2>Add New Card</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('cards.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <hr>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('cards.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name" required="true" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="category">Category</label>
                                    <div class="form-group">
                                            <select name="category" class="form-control" required="true" >
                                                @foreach(\App\CardCategory::all() as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                    <div class="form-group">
                                        <strong>Rate:</strong>
                                        <textarea class="form-control" name="rate" placeholder="Detail" required="true">{{old('rate')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
