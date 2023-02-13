@extends('layouts.app')

@section('content')

    <!-- Hoverable rows start -->
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Withdraws</h4>
                    <div class="card-toolbar">
                        <a href="{{route('withdraw')}}" class="btn btn-info font-weight-bolder font-size-sm mr-3">Withdraw Now</a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Showing Recent 5 withdraws
                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Bank Name</th>
                            <th>
                                Account Name
                            </th>
                            <th>Ac No</th>
                            <th>Recieved Amount</th>
                            <th>status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($withdraws as $withdraw)
                            <tr>

                                <td>
                                    <a href="#"
                                       class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$withdraw->trx_id}}</a>
                                </td>
                                <td>
                                    <span>{{$withdraw->bank_name}}</span>

                                </td>
                                <td>
																	<span>{{$withdraw->account_name}}</span>
                                </td>
                                <td>
																	<span>{{$withdraw->account_no}}</span>

                                </td>
                                <td>
																	<span>{{$withdraw->amount}}</span>

                                </td>
                                <td>
                                    <span>{{$withdraw->status}}</span>
                                </td>

                                <td><span>{{$withdraw->created_at}}
                                                                        </span></td>
                                <td><span>{{$withdraw->updated_at}}
                                                                        </span></td>
                                <td>
                                    <a href="{{route('withdraws.show',$withdraw->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:dashboard/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path
                                                                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                        fill="#000000" />
																					<path
                                                                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                        fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">{{$withdraws->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hoverable rows end -->












@endsection
