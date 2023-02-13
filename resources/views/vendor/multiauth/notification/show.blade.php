@extends('multiauth::layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Notification</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('notification.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">news</i>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Notification</strong></h3>
                    <hr class="border-danger"/>
                    @if (\Session::has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{!! \Session::get('success') !!}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <td><strong>Notification</strong></td>
                        </tr>
                        <tr>

                            <td>{{$announcement->announcement}}</td>

                        </tr>

                    </table>
                    <hr />
                    <div class="text-center">
                        <a href="{{ route('notification.edit',$announcement->id) }}" class="btn btn-round btn-rose">
                            Update Notification<i class="material-icons">assignment</i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
