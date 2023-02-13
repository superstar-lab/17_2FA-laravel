@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">people</i>
                    </div>
                </div>

                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Account Details</strong></h3>
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
                            <td><strong>User ID</strong></td>

                            <td>{{$user->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>User Name</strong></td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td><strong>User Email</strong></td>

                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td><strong>User Balance</strong></td>

                            <td>{{$user->balance}}</td>
                        </tr>
                        <tr>
                            <td><strong>BTC Wallet Balance</strong></td>

                            <td>{{$btc_balance}}</td>
                        </tr>
                        <hr>
                        <tr>
                            <td colspan="2">
                                <h3 class="text-rose text-center">Bank Details</h3>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>Bank Name</strong></td>

                            <td>{{$user->bank->bank_name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Account Name</strong></td>

                            <td>{{$user->bank->account_name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Account No</strong></td>

                            <td>{{$user->bank->account_no}}</td>
                        </tr>
                        <br><br>
                        <tr>
                            <td><strong>Total Transactions Done</strong></td>

                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Total Withdrawls Done</strong></td>

                            <td></td>
                        </tr>
                    </table>
                    <hr />
                    <hr />
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-round btn-rose" data-toggle="modal" data-target="#loginModal">
                            Update Balance<i class="material-icons">assignment</i>
                        </button>

                        <a href="{{url('/admin/users/'.$user->id.'/chat')}}" class="btn btn-round btn-primary text-white">
                            Chat<i class="material-icons">chat</i>
                        </a>



                        <form class="form" method="post" action="{{route('admin.users.ban',['id' => $user->id])}}">
                            @csrf
                            <button class="btn btn-round {{($user->banned_until && now()->lessThan($user->banned_until)) ? 'btn-success' : 'btn-danger'}}" type="submit">
                                {{($user->banned_until && now()->lessThan($user->banned_until)) ? 'Unban' : 'Ban'}} User <i class="material-icons">close</i>
                            </button>
                        </form>






                    </div>
                    <hr />
                    <hr />
                    <div class="d-flex flex-wrap justify-content-around">

                        <a class="btn btn-round btn-info mt-3" href="{{route('admin.orders.user',$user->id)}}">
                            Trades History
                        </a>
                        <a class="btn btn-round btn-info mt-3" href="{{route('admin.btcsell.user',$user->id)}}">
                           Internal Bitcoin Transfer
                        </a>
                                                <a class="btn btn-round btn-primary mt-3" href="{{route('admin.withdraws.user',$user->id)}}">
                            Withdraw History
                        </a>
                                                <a class="btn btn-round btn-warning mt-3" href="{{route('admin.cardorder.user',$user->id)}}">
                            Card Order History
                        </a>
                                                <a class="btn btn-round btn-success mt-3" href="{{route('admin.rechargeorders.user',$user->id)}}">
                            Recharge History
                        </a>
                        @if($user->wallet)
                        <a class="btn btn-round btn-dark mt-3" href="https://www.blockchain.com/btc/address/{{$user->wallet->btc_address}}">
                            Bitcoin Transaction History
                        </a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>


<!--//New Feature - -->
<h3 class="text-center" style="font-weight:bold">Gift Card Transactions</h3>
      <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>test2</td>
                                    <td>test@gmail.com</td>
                                    <td>989898989</td>
                                    <td>90</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>




<h3 class="text-center" style="font-weight:bold">Internal Btc Transfer</h3>
      <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>test2</td>
                                    <td>test@gmail.com</td>
                                    <td>989898989</td>
                                    <td>90</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


<h3 class="text-center" style="font-weight:bold">External Btc Transactions</h3>
      <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Balance</th>
                                <th class="text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>test2</td>
                                    <td>test@gmail.com</td>
                                    <td>989898989</td>
                                    <td>90</td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


<!--//end -->





    <div class="modal fade" id="loginModal" tabindex="-1" role="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>

                            <h4 class="card-title">Update Balance</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="{{route('admin.users.update',['id' => $user->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">


                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">comment</i></div>
                                        </div>
                                        <input placeholder="balance" value="{{$user->balance}}" name="balance" class="form-control" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-primary btn-wd btn-lg">Update Balance</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>

     <!--New Feature js -->
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
    
    <script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
     <!--end-->


 


@endsection
