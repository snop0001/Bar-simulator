@extends('layouts.app')
@section('header')
    <div class="content-header">
        <h1 class="text-center text-pink text-xl"> Hello {{Auth::user()->name}}, are you ready to order?</h1>
    </div>
@endsection

@section('content')
    <br>
    <div class="container-fluid">
        <div class="card bg-card ">
            <div class="card-header bg-gradient-lightblue">
                <h3 class=" text-center "> send a new order for the bar</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="was-validated" method="POST" action="{{ route('orders.store') }}">
                    @csrf
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
                                    <option value="">Choose a drink</option>
                                    <option value='Espresso Martini' @if(old('drink') === 'Espresso Martini') {{'selected'}}@endif>Espresso Martini</option>
                                    <option value='MR Watermelon'@if(old('drink') === 'MR Watermelon') {{'selected'}}@endif>MR Watermelon</option>
                                    <option value='Mai Tai'@if(old('drink') === 'Mai Tai') {{'selected'}}@endif>Mai Tai</option>
                                    <option value='Margarita'@if(old('drink') === 'Margarita') {{'selected'}}@endif>Margarita</option>
                                    <option value='Mojito'@if(old('drink') === 'Mojito') {{'selected'}}@endif>Mojito</option>
                                    <option value='Hot Chocolate to Die for'@if(old('drink') === 'Hot Chocolate to Die for') {{'selected'}}@endif>Hot Chocolate to Die for</option>
                                    <option value='Bramble'@if(old('drink') === 'Bramble') {{'selected'}}@endif>Bramble</option>
                                    <option value='Shark Attack'@if(old('drink') === 'Shark Attack') {{'selected'}}@endif>Shark Attack</option>
                                    <option value='Amaretto Sunrise'@if(old('drink') === 'Amaretto Sunrise') {{'selected'}}@endif>Amaretto Sunrise</option>
                                    <option value='White Russian' @if(old('drink') === 'White Russian') {{'selected'}}@endif>White Russian</option>
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
                                       placeholder="Number of drinks 1-10" value="{{old('amount')}}" required>
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
                                    <input type="radio" id="Ice1" name="ice" class="custom-control-input" value="No Ice" {{ old('ice')==="No Ice" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="Ice1">No Ice</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Ice2" name="ice" class="custom-control-input" value="Regular" {{ old('ice')==="Regular" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="Ice2">Regular</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="Ice3" name="ice" class="custom-control-input" value="Extra Ice" {{ old('ice')==="Extra Ice" ? 'checked='.'"'.'checked'.'"' : '' }}required>
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
                                    <input type="radio" id="alco1" name="alcohol_level" class="custom-control-input" value="Virgin" {{ old('alcohol_level')==="Virgin" ? 'checked='.'"'.'checked'.'"' : '' }} required>
                                    <label class="custom-control-label" for="alco1">Virgin</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alco2" name="alcohol_level" class="custom-control-input" value="Regular" {{ old('alcohol_level')==="Regular" ? 'checked='.'"'.'checked'.'"' : '' }}required>
                                    <label class="custom-control-label" for="alco2">Regular</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="alco3" name="alcohol_level" class="custom-control-input" value="Extra Strong" {{ old('Extra Strong')==="Extra Strong" ? 'checked='.'"'.'checked'.'"' : '' }}required>
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
                        <div class="custom-control custom-checkbox">
                            <input onclick=isChecked() type="checkbox" class="custom-control-input" id="allergies_checkbox" name="allergies">
                            <label class="custom-control-label" for="allergies_checkbox">Check this box if you have any allergies</label>
                        </div>
                        </div>

                        <div id="allergies-box" style="display:none" class="col-md-6 mb-3">
                            <label for="allergies_info">Please write them down here</label>
                            <div>
                        <textarea name="allergies_info"
                                  id="textAreaAllergy"
                                  class="form-control is-invalid"
                                  type="text"
                                  placeholder="Name your allergies here" >{{old('allergies_info')}}</textarea>
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
                                  placeholder="Any other instructions you would like us to follow when making your drinks">{{old('additional_instructions')}}</textarea>
                            </div>
                            @error('additional_instructions')
                            <p class="text-red">{{ $message }}</p>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-success btn-lg btn-lg btn-block">Create Order</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        const checkbox = document.getElementById('allergies_checkbox');

        const box = document.getElementById('allergies-box');

        function isChecked() {
            if (checkbox.checked) {
                box.style.display = 'block';
                checkbox.value=1;
                document.getElementById(" textAreaAllergy").required = true;
            } else {
                box.style.display = 'none';
                checkbox.value=0;
                document.getElementById(" textAreaAllergy").required = false;
            }
        }
    </script>

@endsection


{{--<input type="string" class="form-control" id="order_number" aria-describedby="emailHelp">--}}
{{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
{{--</div>--}}
