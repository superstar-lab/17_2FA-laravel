@extends('multiauth::layouts.app')
@section('content')
    @php
        $order_count = [
       'total' =>  App\Models\Order::all()->count(),
       'pending' => App\Models\Order::where('status','Pending')->count(),
       'processing' => App\Models\Order::where('status','Processing')->count(),
       'completed' => App\Models\Order::where('status','Completed')->count(),
       'cancelled' => App\Models\Order::where('status','Cancelled')->count(),
       'suspended' => App\Models\Order::where('status','Suspended')->count(),
    ];
        $withdraw_count = [
       'total' =>  App\Models\Withdraw::all()->count(),
       'pending' => App\Models\Withdraw::where('status','Pending')->count(),
       'processing' => App\Models\Withdraw::where('status','Processing')->count(),
       'completed' => App\Models\Withdraw::where('status','Completed')->count(),
       'cancelled' => App\Models\Withdraw::where('status','Cancelled')->count(),
       'suspended' => App\Models\Withdraw::where('status','Suspended')->count(),
    ];
    
                        $sum = \App\Models\User::all()->sum('balance');
                        
    @endphp
    @admin('super')
    <div class="row justify-content-center">
        
        <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-text card-header-warning">
                  <div class="card-text">
                    <h4 class="card-title">Latest Messages</h4>
                    <p class="card-category">Latest Unread Messages</p>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Message</th>
                      <th>Details</th>
                    </thead>
                    <tbody>
                        @foreach($unreadUsers as $k => $u)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->messages->last()->message ?? ''}}</td>
                        <td><a href="{{url('/admin/users/'.$u->id.'/chat')}}" class="btn btn-warning btn-round">Go to Chat</a></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                  {{$unreadUsers->links()}}
                </div>
              </div>
            </div>
        
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Total Balances</h3>
                    <div class="card-icon icon-rose">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$sum }} Naira</strong></h3>

                    <a href="{{route('admin.users.index')}}" class="btn btn-rose btn-round mt-4">See Users</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Pending Trades Orders</h3>
                    <div class="card-icon icon-warning">
                        <i class="material-icons">report_problem</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$order_count['pending'] }}</strong></h3>

                    <a href="{{route('admin.orders.index', 'Pending')}}" class="btn btn-warning btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Processing Trades Orders</h3>
                    <div class="card-icon icon-info">
                        <i class="material-icons">hourglass_bottom</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$order_count['processing']}} </strong></h3>

                    <a href="{{route('admin.orders.index', 'Processing')}}" class="btn btn-info btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Completed Trades Order</h3>
                    <div class="card-icon icon-success">
                        <i class="material-icons">done</i>
                    </div>
                    <h3 class="card-title"> <strong>{{$order_count['completed']}}</strong></h3>

                    <a href="{{route('admin.orders.index', 'Completed')}}" class="btn btn-success btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Canceled Trades Order</h3>
                    <div class="card-icon icon-danger">
                        <i class="material-icons">highlight_off</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$order_count['cancelled'] }}</strong></h3>

                    <a href="{{route('admin.orders.index', 'Cancelled')}}" class="btn btn-danger btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Pending Withdraw Request</h3>
                    <div class="card-icon icon-warning">
                        <i class="material-icons">report_problem</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$withdraw_count['pending'] }}</strong></h3>

                    <a href="{{route('admin.withdraws.index', 'Pending')}}" class="btn btn-warning btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Processing Withdraw Request</h3>
                    <div class="card-icon icon-info">
                        <i class="material-icons">hourglass_bottom</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$withdraw_count['processing']}} </strong></h3>

                    <a href="{{route('admin.withdraws.index', 'Processing')}}" class="btn btn-info btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Completed Withdraw Request</h3>
                    <div class="card-icon icon-success">
                        <i class="material-icons">done</i>
                    </div>
                    <h3 class="card-title"> <strong>{{$withdraw_count['completed']}}</strong></h3>

                    <a href="{{route('admin.withdraws.index', 'Completed')}}" class="btn btn-success btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h3 class="card-category">Canceled Withdraw Request</h3>
                    <div class="card-icon icon-danger">
                        <i class="material-icons">highlight_off</i>
                    </div>
                    <h3 class="card-title"> <strong> {{$withdraw_count['cancelled'] }}</strong></h3>

                    <a href="{{route('admin.withdraws.index', 'Cancelled')}}" class="btn btn-danger btn-round mt-4">Check Now</a>
                </div>
            </div>
        </div>
    </div>

    @endadmin

    @admin('writter')

    <div class="row justify-content-center">

        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('announcement.index')}}" class="btn btn-block btn-rose my-2 py-3">Announcement</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('blogs.index')}}" class="btn btn-block btn-rose my-2 py-3">Blogs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('terms.index')}}" class="btn btn-block btn-rose my-2 py-3">Terms and Conditions</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('testimonial.index')}}" class="btn btn-block btn-rose my-2 py-3">Testimonials</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('faq.index')}}" class="btn btn-block btn-rose my-2 py-3">Faqs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('admin.settings')}}" class="btn btn-block btn-rose my-2 py-3">Homepage Setting</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('about.index')}}" class="btn btn-block btn-rose my-2 py-3">About Page</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <a href="{{route('trade.index')}}" class="btn btn-block btn-rose my-2 py-3">How to trade Page</a>
                </div>
            </div>
        </div>

    </div>


    @endadmin







@endsection
