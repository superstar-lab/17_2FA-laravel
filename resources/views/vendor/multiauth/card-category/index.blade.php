@extends('multiauth::layouts.app')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-success" href="{{ route('card-category.create') }}"> Create New Card Category</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th>Card Category Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($card_categories as $card_category)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <img src="{{asset('image/'.$card_category->image)}}" rel="nofollow" alt="...">
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        <a href="#">{{$card_category->name}}</a>
                                    </td>

                                    <td class="td-actions">
                                        <a href="{{ route('card-category.edit',$card_category->id) }}" type="button" rel="tooltip" data-placement="left" title="Edit Card" class="btn btn-simple d-inline-block">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="d-inline-block" action="{{ route('card-category.destroy',$card_category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" data-placement="left" title="Remove Card" class="btn btn-danger d-inline-block">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="row justify-content-center">
                        <div>
                            {{$card_categories->links()}}
                        </div>

                        </div>
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

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>

@endsection
