@extends('homeapp')

@push('title','Rate Calculator – Sell Gift Cards In Nigeria | GC BUYING')

@push('meta','Want to know the amount you will be paid for your gift card in naira? Click on the link and calculate your
gift cards worth using rate calculator.')

@section('banner')
    <!-- banner -->
    <div id="home" class="hero-single grdnt-blue style-wave-1 bg-trans-2">
        <div class="container">
            <div class="row text-center">
                <div class="intro-text light">
                    <h3>Rate Calculator</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
@endsection

@section('content')


<div id="main">
    <section id="features" style="margin-top: 100px;">
        <div class="container">

            <!-- Project One -->
            @php
            $categories = \App\CardCategory::all();
            if(request()->has('category_id')){
                $cards = \App\Models\Card::where('card_category_id',request('category_id'))->get();
            }else{
                $cards = \App\Models\Card::where('card_category_id',$categories->first()->id)->get();
            }

            @endphp
            <div class="row justify-content-center">
                <div style="margin-bottom: 20px;" class="col-md-9">
                    <div class="card">
                        <form>
                            <div class="card-body mt-4">
                                <div class="row" style="margin-bottom: 10px">
                                <label class="col-md-3 col-form-label">Select Your Category</label>
                                <div class="col-md-9">
                                    <select id="category" class="form-control"  name="category_id"  required="true" onchange="this.form.submit()">
                                        <option disabled> Select Your card category</option>
                                        @foreach($categories as $card)
                                            <option value="{{$card->id}}" {{ (request('category_id') == $card->id ? "selected":"") }}>{{$card->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                                <div class="row" style="margin-bottom: 10px">
                                    <label class="col-md-3 col-form-label">Select Your Card</label>
                                    <div class="col-md-9">
                                        <select id="cardSelection" class="form-control">
                                            <option> Select Your card</option>
                                            @foreach($cards as $index => $card)
                                                <option value="{{$card->id}}" data-rate="{{$card->rate}}">{{$card->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Total Amount ($)</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="sell_amount" value="{{old('total_amount') ?? '0.00'}}" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">You Will Get (N)</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="get_amount" value="{{old('sell_amount')?? '0.00'}}" type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                let selection = document.getElementById("cardSelection");

                selection.onchange = function(event){
                    let rate = event.target.options[event.target.selectedIndex].dataset.rate;
                    const sell_amount = document.getElementById("sell_amount");
                    const get_amount = document.getElementById("get_amount");
                    get_amount.value = parseFloat(sell_amount.value) * rate;
                    sell_amount.addEventListener('change', updateValue);
                    function updateValue(e) {
                        get_amount.value = parseFloat(e.target.value) * rate;
                    }
                };



            </script>












        </div>
    </section>
</div>

@stop
