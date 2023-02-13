@extends('multiauth::layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Orders</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Method</th>
                                <th>Sell Amount ($)</th>
                                <th>Rate</th>
                                <th>Received Amount(N)</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Method</th>
                                <th>Sell Amount ($)</th>
                                <th>Rate</th>
                                <th>Received Amount(N)</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->txn_id}}</td>
                                    <td>{{$order->method}}</td>
                                    <td>{{$order->total_amount}}</td>
                                    <td>{{$order->rate}}</td>
                                    <td>{{$order->get_amount}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{Carbon\Carbon::parse($order->created_at)}}</td>
                                    <td>{{Carbon\Carbon::parse($order->updated_at)}}</td>
                                    <td class="text-right">
                                        <a href="{{route('admin.orders.show',['id' => $order->id])}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>

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
