@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <!--begin::Advance Table Widget 5-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Recent Trades and Sells</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Showing Recent 5 orders</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{route('sell.bitcoin')}}" class="btn btn-info font-weight-bolder font-size-sm mr-3">Trade Now</a>
                        <a href="{{route('sell.index')}}" class="btn btn-info font-weight-bolder font-size-sm">Sell Now</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                            <thead>
                            <tr class="text-uppercase">

                                <th class="pl-0" style="min-width: 100px">Transaction ID</th>
                                <th style="min-width: 120px">Method</th>
                                <th style="min-width: 150px">
                                    Sell Amount
                                </th>
                                <th style="min-width: 150px">Rate</th>
                                <th>Recieved Amount</th>
                                <th style="min-width: 130px">status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="pr-0 text-right" style="min-width: 160px">action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                            <tr>

                                <td class="pl-0">
                                    <a href="#"
                                       class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$order->txn_id}}</a>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->method}}</span>

                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->total_amount}}</span>
                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->rate}}</span>

                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->get_amount}}</span>

                                </td>
                                <td>
                                    <span class="label label-lg label-light-primary label-inline">{{$order->status}}</span>
                                </td>

<td><span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->created_at}}
                                                                        </span></td>
                                    <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$order->updated_at}}
                                                                        </span></td>


                                <td class="pr-0 text-right">
                                    <a href="{{route('orders.show',$order->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                    <!--end::Table-->
                </div>
                <!--end::Body-->
                <div class="card-footer">
                    <div class="d-flex justify-content-center">{{$orders->links()}}</div>
                </div>
            </div>
            <!--end::Advance Table Widget 5-->
        </div>
    </div>



@endsection
