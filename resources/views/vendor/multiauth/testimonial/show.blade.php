@extends('multiauth::layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Faq</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('testimonial.index') }}"> Back</a>
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
                    <h3 class="card-title text-center"><strong>Testimonial</strong></h3>
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
                            <td><strong>Name</strong></td>
                        </tr>
                        <tr>

                            <td>{{$testimonial->name}}</td>

                        </tr>
                        <tr>
                            <td><strong>Text</strong></td>
                        </tr>
                        <tr>

                            <td>{{$testimonial->text}}</td>

                        </tr>

                    </table>
                    <hr />
                    <div class="text-center">
                        <a href="{{ route('testimonial.edit',$testimonial->id) }}" class="btn btn-round btn-rose">
                            Update Testimonial<i class="material-icons">assignment</i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
