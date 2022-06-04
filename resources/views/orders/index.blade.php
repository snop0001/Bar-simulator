@extends('layouts.app')

@section('header')
    <div class="content-header">
        <h1 class="text-center text-pink text-xl"> Here are All Your Orders {{ Auth::user()->name}}</h1>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="has-text-right">
                        <a href="{{route('orders.create')}}" class="btn btn-info btn-lg float-right">Add a new
                            order</a>
                    </div>
                        <table class="table table-bordered table-hover table-secondary ">
                            <thead class="bg-lightblue rounded-pill">
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Drink</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Ice</th>
                                <th scope="col">Alcohol Level</th>
                                <th scope="col">Allergies</th>
                                <th scope="col">Additional Instructions</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated last</th>
                            </tr>
                            </thead>
                            <tbody class="bg-gradient-light">
                            @foreach($orders as $order)
                                @if($order->user->id === Auth::user()->id)
                                <tr>
                                    <th scope="row"><a
                                            href="{{Route('orders.show',$order)}}">{{ $order->id }}</a>
                                    </th>
                                    <td>{{$order->drink}}</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{$order->ice}}</td>
                                    <td> {{$order->alcohol_level}}</td>
                                    <td class = "{{$order->allergies === false ? 'bg-light-gray':'bg-warning'}}">
                                        {{$order->allergies === false ? 'No Reported Allergies': $order->allergies_info}}</td>
                                    <td class = "{{$order->additional_instructions === null ? 'bg-light-gray':''}}">
                                        {{$order->allergies_info}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
@endsection
