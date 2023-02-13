@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">announcement</i>
                    </div>
                    <h4 class="card-title">Announcement</h4>
                </div>

                <div class="card-body">
                    @php
                    $notifications = App\Announcement::all();
                    $orders = App\Models\Order::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get();
                    $withdraws = App\Models\Withdraw::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get();

                    @endphp
                    @foreach($notifications as $notification)
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                        <i class="material-icons" data-notify="icon">announcement</i>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                        <span data-notify="message">{{$notification->announcement}}</span>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">announcement</i>
                    </div>
                    <h4 class="card-title">Actions</h4>
                </div>

                <div class="card-body pb-5">


                    <div class="row">
                        <div class="col-12 col-md-4 justify-content-center align-items-center text-center">
                            <a class="btn btn-primary" href="{{route('sell')}}">Click to Sell Gift Card</a>
                        </div>
                        <div class="col-12 col-md-4 justify-content-center align-items-center text-center">
                            <a class="btn btn-rose" href="{{route('sell.bitcoin')}}">Click to Trade Bitcoin</a>
                        </div>
                        <div class="col-12 col-md-4  justify-content-center align-items-center text-center">
                            <a class="btn btn-warning" href="{{route('withdraw')}}">Click To Withdraw</a>
                        </div>
                    </div>




                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Recent Trades and Sells</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables1" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Method</th>
                                <th>Sell Amount ($)</th>
                                <th>Rate</th>
                                <th>Received Amount(N)</th>
                                <th>Status</th>
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
                                    <td class="text-right">
                                        <a href="{{route('orders.show',$order->id)}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>

            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Recent Withdraws</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account No</th>
                                <th>Received Amount(N)</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account No</th>
                                <th>Received Amount(N)</th>
                                <th>Status</th>
                                <th class="text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td>{{$withdraw->trx_id}}</td>
                                    <td>{{$withdraw->bank_name}}</td>
                                    <td>{{$withdraw->account_name}}</td>
                                    <td>{{$withdraw->account_no}}</td>
                                    <td>{{$withdraw->amount}}</td>
                                    <td>{{$withdraw->status}}</td>
                                    <td class="text-right">
                                        <a href="{{route('withdraws.show',$withdraw->id)}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
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
    </div>
</div>
<script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatables1').DataTable({
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
        $('#datatables2').DataTable({
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
