@extends('multiauth::layouts.app')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-success" href="{{ route('testimonial.create') }}"> Create New Testimonial</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Text</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>{{$testimonial->id}}</td>
                                    <td>
                                        {{$testimonial->name}}
                                    </td>
                                    <td>
                                        {{$testimonial->text}}
                                    </td>

                                    <td class="td-actions">
                                        <a href="{{ route('testimonial.edit',$testimonial->id) }}" type="button" rel="tooltip" data-placement="left" title="Edit Testimonial" class="btn btn-simple d-inline-block">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="d-inline-block" action="{{ route('testimonial.destroy',$testimonial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" data-placement="left" title="Remove Testimonial" class="btn btn-danger d-inline-block">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->


    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "order": [[ 0, "desc" ]],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
        });
    </script>

@endsection
