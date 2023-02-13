@extends('multiauth::layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card ">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('terms.update')}}">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">globe</i>
                    </div>
                    <h4 class="card-title">Edit Terms and Conditions</h4>
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
                        <label class="col-md-3 col-form-label">Terms</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea id="body" class="form-control" name="text" rows="4">{{$terms->text ?? old('text')}}</textarea>
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






@endsection
