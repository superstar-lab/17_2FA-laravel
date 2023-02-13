@extends('multiauth::layouts.app')
@section('content')

    <div class="row">
        <a href="{{route('emailview.sendEmail')}}"><button class="btn btn-primary">Send Emails</button></a>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Emails</h4>
                    
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>From</th>
                                <th>TO</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>From</th>
                                <th>TO</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="disabled-sorting text-right">Details</th>
                            </tr>
                            </tfoot>
                            <tbody>

                        

                            </tbody>
                        </table>
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
