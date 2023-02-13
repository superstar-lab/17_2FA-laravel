@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card">
                @if (\Session::has('success'))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{!! \Session::get('success') !!}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                    <form action="{{route('emailview.handleEmail')}}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">Send Emails</h3>
                        <hr>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Content</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter content"
                                id="why_text"
                                name="content"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Subject</label>
                            <input
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Subject"
                                id="why_text"
                                name="subject"
                            >
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label class="control-label" for="facebook_pixels">Select Users</label>-->
                        <!--    <input-->
                        <!--        class="form-control py-3 my-3"-->
                        <!--        rows="3"-->
                        <!--        placeholder="All Users"-->
                        <!--        id="why_text"-->
                        <!--        name="why_text"-->
                        <!--    >-->
                        <!--</div>-->
                      
                        <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send Email To All Users</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
                    </div>

                </div>




    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
