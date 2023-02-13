@extends('multiauth::layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card py-5 justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Notification</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('notification.index') }}"> Back</a>
                        </div>
                    </div>
                </div>

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
                    <div class="col-8">
                        <form action="{{ route('notification.update',$announcement->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">

                                        <textarea class="form-control" name="announcement" placeholder="Write Your Notification Here" id=""  rows="6">{{$announcement->announcement}}</textarea>
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
