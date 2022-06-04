@extends('layouts.app')

@section('header')
    <h1 class=" text-pink text-xl text-center"> Order Details View</h1>
@endsection

@section('content')

    <div class="card bg-card">
        <div class="card-header small-box bg-gradient-pink">
            <div class="inner">
                <h3 class="text-center">Your Order Number - {{$order->id}}</h3>
                {{--                    <h2 class="float-right">--}}
                {{--                    <span class=" badge badge-pill--}}
                {{--                @if($order->status === 'Production Pending')--}}
                {{--                        badge-secondary--}}
                {{--                @elseif($order->status === 'In Production')--}}
                {{--                        badge-info--}}
                {{--                @elseif($order->status === 'Paused' || $order->status === 'Admin Hold')--}}
                {{--                        badge-warning--}}
                {{--                @elseif($order->status === 'Done')--}}
                {{--                        badge-success--}}
                {{--                @elseif($order->status === 'Quality Check Pending')--}}
                {{--                        bg-lightblue--}}
                {{--                @elseif($order->status === 'Canceled')--}}
                {{--                        badge-dark--}}
                {{--                @endif  ">{{$order->status}}</span></h2>--}}
                <div class="text-center">
                    <span class="badge badge-pill badge-primary">Created At - {{$order->created_at}}</span>
                    <span class="badge badge-pill badge-primary">Last Update - {{$order->updated_at}}</span>
                    <h4><span
                            class="badge badge-pill {{$order->amount>3 && $order->alcohol_level !== 'Virgin' ? 'badge-warning':'badge-success'}}">
                    {{$order->amount>3 && $order->alcohol_level !== 'Virgin'? 'Please Drink Carefully!':'Enjoy your drinks!'}}</span>
                    </h4>
                </div>
                <div class="control">
                    <button class="btn bg-pink btn-lg float-right"
                            onclick=window.location.href="{{route('orders.edit', $order)}}">
                        Edit Order Details
                    </button>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-glass-cheers"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="card-subtitle border-left">
            </div>

            <h5 class="card bg-gradient-black">Drink Overview</h5>
            <p>You ordered {{$order->amount . ' ' .$order->drink}}{{$order->amount>1 ? 's':''}}</p>

            <h5 class="card bg-gradient-black">Specifications: </h5>
            <ul>
                <li>{{$order->ice}} </li>
                <li> {{$order->alcohol_level }} drink{{$order->amount>1 ? 's':''}}</li>
            </ul>
            <h5 class="card bg-gradient-black">Extra Information provided: </h5>
            <h5><span
                    class="badge badge-pill {{$order->allergies === 0||$order->allergies === false ? 'bg-light-gray':'bg-warning'}}"> {{$order->allergies === 0||$order->allergies === false ? 'No Reported Allergies': 'Allergies mentioned'}}</span>
            </h5>
            <strong>{{$order->allergies === false ? '': $order->allergies_info}}</strong>
            <h5 class="card bg-gradient-black">Instructions asked for:</h5>
            <strong class="{{$order->additional_instructions === null ? 'bg-light-gray':''}}">
                {{$order->additional_instructions}}</strong>

            <div class="card-footer">
                <h3 class="float-right">Hope You will enjoy!</h3>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

@endsection
