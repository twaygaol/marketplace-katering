<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth'); 
    // }
    
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create(Catering $catering)
    {
        return view('orders.create', compact('catering'));
    }

    public function store(Request $request, Catering $catering)
    {
        $request->validate([
            'quantity' => 'required|integer',
            'delivery_date' => 'required|date',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->catering_id = $catering->id;
        $order->quantity = $request->quantity;
        $order->delivery_date = $request->delivery_date;
        $order->save();

        return redirect()->route('orders.show', $order->id);
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
