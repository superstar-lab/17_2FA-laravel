@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">


                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th>Card Name</th>
                            <th class="th-description">Per USD Rate</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cards as $card)
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <a href="{{asset('image/'.$card->image)}}"><img class="img-thumbnail" class="width: 100%;
  max-width: 400px;
  height: auto;" src="{{asset('image/'.$card->image)}}" rel="nofollow" alt="..."></a>
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#">{{$card->name}}</a>
                                </td>
                                <td>
                                    {{$card->rate}} N
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-center">{{ $cards->links() }}</div>
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
