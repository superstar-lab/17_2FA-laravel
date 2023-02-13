@extends('multiauth::layouts.app')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-success" href="{{ route('cards.create') }}"> Create New Card</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="" class="d-flex justify-content-center">
                                <input name="search" class="form-control" type="search" value="{{request('search')}}" placeholder="Search a card">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                        <tr>
                            <th>Card Name</th>
                            <th>Card Category</th>
                            <th class="th-description">Per USD Rate</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cards as $card)
                                <tr>
                                    <td class="td-name">
                                        <a href="#">{{$card->name}}</a>
                                    </td>

                                    <td>
                                        @if($card->cardCategory)
                                             {{ucfirst($card->cardCategory->name)}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$card->rate}} N
                                    </td>



                                    <td class="td-actions">
                                        <a href="{{ route('cards.edit',$card->id) }}" type="button" rel="tooltip" data-placement="left" title="Edit Card" class="btn btn-simple d-inline-block">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form class="d-inline-block" action="{{ route('cards.destroy',$card->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" data-placement="left" title="Remove Card" class="btn btn-danger d-inline-block">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                        <form class="d-inline-block" action="{{ route('cards.toggle',$card->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-{{ ($card->status == 1) ? 'warning' : 'success' }} d-inline-block">
                                                {{ ($card->status == 1) ? 'Disable' : 'Enable' }} Card
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <div class="row justify-content-center">
                        <div>
                            {{$cards->links()}}
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
