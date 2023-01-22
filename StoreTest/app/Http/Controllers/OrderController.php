<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function orders(){
        $order = Order::query()
            ->join('users', function ($join) {
                $join->on('orders.user_id', '=', 'users.user_id');
            })
            ->join('posts', function ($join) {
                $join->on('orders.post_id', '=', 'posts.post_id');
            })
            ->paginate();

        return view('orders');
    }


    public function addOrder(Request $request){
        $orders = session()->get('cart');
        $newOrder = session()->get('order');

        foreach ($orders as $order){
            if (\auth()){
                $newOrder['post_id'] = [
                    'post_id' => $order['post_id'],
                    'postName' => $order['postName'],
                    'user_id' => Auth::id(),
                    'userName' => Auth::user()->name,
                    'userEmail' => Auth::user()->email,
                    'quantity' => $order['quantity'],
                    'price' => $order['price'],
                    'description' =>$order['description'],
                    "width" => $order['width'],
                    "height" => $order['height'],
                    "weight" => $order['weight']
                ];
            }
            else{
                $newOrder['post_id'] = [
                    'post_id' => $order['post_id'],
                    'postName' => $order['postName'],
                    'user_id' => null,
                    'quantity' => $order['quantity'],
                    'price' => $order['price'],
                    'description' =>$order['description'],
                    "width" => $order['width'],
                    "height" => $order['height'],
                    "weight" => $order['weight']
                ];
            }
        }


        unset($orders);
        session()->put('cart');
        session()->put('order', $newOrder);


        return redirect()->back()->with('successAddCart', 'Успешно добвалено, посмотрите заказы');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
