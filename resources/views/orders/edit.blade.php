@extends('layouts.app')
@section('header')
    <div class="content-header">
        <h1 class="text-center text-pink text-xl"> Want to change your order {{ Auth::user()->name}}?</h1>
    </div>
@endsection

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card create-order-card">
            <div class="card-header bg-gradient-info">
                <h3 class="  text-center ">Edit Order Number {{$order->id}}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('orders.update',$order) }}">
                    @csrf
                    @method('PUT')
                    <div style="display:none">
                        <label for="user_id"></label>
                        <div>
                            <input type="hidden" class="form-control is-valid "
                                   name="user_id"
                                   value="{{Auth::user()->id}}">
                        </div>
                    </div>
                    <h5 class="card create-order-card-titles text-center">Client and Order Details</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="drink">What would you like to drink?</label>
                            <div>
                                <select name="drink" class="custom-select @error('drink') is-invalid @enderror" required>
                                    <option value='Espresso Martini' @if($order->drink === 'Espresso Martini') {{'selected'}}@endif>Espresso Martini</option>
                                    <option value='MR Watermelon'@if($order->drink === 'MR Watermelon') {{'selected'}}@endif>MR Watermelon</option>
                                    <option value='Mai Tai'@if($order->drink === 'Mai Tai') {{'selected'}}@endif>Mai Tai</option>
                                    <option value='Margarita'@if($order->drink === 'Margarita') {{'selected'}}@endif>Margarita</option>
                                    <option value='Mojito'@if($order->drink === 'Mojito') {{'selected'}}@endif>Mojito</option>
                                    <option value='Hot Chocolate to Die for'@if($order->drink === 'Hot Chocolate to Die for') {{'selected'}}@endif>Hot Chocolate to Die for</option>
                                    <option value='Bramble'@if($order->drink === 'Bramble') {{'selected'}}@endif>Bramble</option>
                                    <option value='Shark Attack'@if($order->drink === 'Shark Attack') {{'selected'}}@endif>Shark Attack</option>
                                    <option value='Amaretto Sunrise'@if($order->drink === 'Amaretto Sunrise') {{'selected'}}@endif>Amaretto Sunrise</option>
                                    <option value='White Russian' @if($order->drink === 'White Russian') {{'selected'}}@endif>White Russian</option>
                                </select>
                            </div>
                            @error('drink')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="required" for="amount">how many drinks?</label>
                            <div>
                                <input type="number" min="1" max="10"
                                       class="form-control is-invalid @error('amount') is-invalid @enderror"
                                       name="amount"
                                       placeholder="Number of drinks 1-10" value="{{$order->amount}}" required>
                            </div>
                            @error('quantity_production')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <h5 class="card create-order-card-titles text-center">Drink Specifications</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label class="required" for="ice">How much ice would you like?</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Ice1" name="ice" class="custom-control-input" value="No Ice" {{ $order->ice==="No Ice" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="Ice1">No Ice</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Ice2" name="ice" class="custom-control-input" value="Regular" {{ $order->ice==="Regular" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="Ice2">Regular</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Ice3" name="ice" class="custom-control-input" value="Extra Ice" {{ $order->ice==="Extra Ice" ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="Ice3">Extra Ice</label>
                                </div>
                            </div>
                            @error('ice')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="required" for="alcohol_level">Alcohol Levels?</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alco1" name="alcohol_level" class="custom-control-input" value="Virgin" {{$order->alcohol_level==="Virgin" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="alco1">Virgin</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alco2" name="alcohol_level" class="custom-control-input" value="Regular" {{$order->alcohol_level==="Regular" ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="alco2">Regular</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alco3" name="alcohol_level" class="custom-control-input" value="Extra Strong" {{ $order->alcohol_level==="Extra Strong" ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="alco3">Extra Strong</label>
                                </div>
                            </div>
                            @error('alcohol_level')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <h5 class="card create-order-card-titles text-center">Additional Information</h5>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="allergies">Do you have allergies?</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input onclick=isChecked() type="radio" id="al1" name="allergies" class="custom-control-input" value=1 {{$order->allergies===true ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                        <label class="custom-control-label" for="al1">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input onclick=isChecked() type="radio" id="al2" name="allergies" class="custom-control-input" value=0 {{$order->allergies===false ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                        <label class="custom-control-label" for="al2">No</label>
                                    </div>
                                </div>
                                @error('allergies')
                                <p class="text-red">{{ $message }}</p>
                                @enderror
                            </div>


                        <div id="allergies-box" @if($order->allergies ===false) style="display:none" @endif  class="col-md-6 mb-3">
                            <label for="allergies_info">Please write them down here</label>
                            <div>
                        <textarea id='info' name="allergies_info"
                                  class="form-control is-invalid"
                                  type="text"
                                  placeholder="Name your allergies here" >{{$order->allergies_info}}</textarea>
                            </div>
                            @error('allergies_info')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="additional_instructions">Any Additional Instructions?</label>
                        <div>
                        <textarea name="additional_instructions"
                                  class="form-control is-valid"
                                  type="text"
                                  placeholder="Any other instructions you would like us to follow when making your drinks">{{$order->additional_instructions}}</textarea>
                        </div>
                        @error('additional_instructions')
                        <p class="text-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                    <br>
                    <div class="float-left">
                        <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                        <a type="button" href="{{ route('orders.show', $order) }}"
                           class="btn btn-light btn-lg">Cancel</a>
                    </div>
                </form>

                <form method="POST" action="{{route('orders.destroy', $order)}}">
                    @csrf
                    @method('DELETE')
                    <button  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-lg float-right" type="submit">Delete</button>
                </form>
            </div>
            <script>
                const yes = document.getElementById('al1');
                const no = document.getElementById('al2');

                const box = document.getElementById('allergies-box');
                const info = document.getElementById('info');

                function isChecked() {
                    if (yes.checked) {
                        box.style.display = 'block';
                    } else {
                        box.style.display = 'none';
                        info.value=null;
                    }
                }
            </script>
        </div>
        <!-- /.card -->

    </div>

@endsection
