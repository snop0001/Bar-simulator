<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $orders = Order::find('user_id',$user->id)->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $order = Order::create($this->validateOrder($request));
        // redirecting to show a page
        return redirect(route('orders.show', compact('order')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,User $user)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order,User $user)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order,User $user)
    {
        $order->update($this->validateOrder($request));
        return redirect(route('orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order,User $user)
    {
        $order->delete();
        return redirect(route('orders.index'));
    }

    /**
     * this function validates the attributes of Order
     * @param Request $request
     * @return array
     */
    public function validateOrder(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'user_id'=>'required',
            'drink'=>'required|string',
            'amount'=>'required|integer|min:1',
            'ice'=>'string',
            'alcohol_level'=>'string',
            'allergies'=>'boolean',
            'allergies_info'=>'',
            'additional_instructions' =>'',
        ]);

        return $validatedAtributes;
    }
}
