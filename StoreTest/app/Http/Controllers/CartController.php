<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Sodium\increment;

class CartController extends Controller
{

    public function getCart(){
        $getCart = Cart::query()->paginate();
        return view('cart', compact('getCart'));
    }


    public function addToCart(Request $request, $post_id){
//        if (Auth::user()){
//            // for auth users save in database
//            $alreadyAdded = Cart::query()
//                ->where('user_id', '=', Auth::id())
//                ->where('post_id', '=', $post_id)
//                ->get();
//
//            foreach ($alreadyAdded as $already){
//
//                if ($post_id == $already->post_id){
//                    $already->quantity = $already->quantity + 1;
//                    $already->save();
//                }
//            }
//
//            if ($alreadyAdded->first() == null){
//                $cart = Cart::create([
//                    'user_id' => Auth::id(),
//                    'post_id' => $post_id,
//                    'quantity' => 1
//                ]);
//            }
//        }
//        // realized by session for unauth users

            $post = Post::find($post_id);
            $cart = session()->get('cart');

            $cart[$post_id] = [
                'user_id' => null,
                'postName' => $post->postName,
                'price' => $post->price,
                'description' => $post->description,
                'post_id' => $post_id,
                'quantity' => $request->quantity,
                'width' => $request->width,
                'height' => $request->height,
                'weight' => $request->weight,
            ];

            session()->put('cart', $cart);

        return redirect()->back()->with('successAddCart', 'Успешно добвалено, посмотрите корзинку');

    }

    public function changeCartQuantity(Request $request, $post_id){
        $cart = session()->get('cart');
        $cart[$post_id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('successAddCart', 'Успешно изменино');
    }

    public function delCartPost(Request $request, $post_id){

        $post = session()->get('cart');
        unset($post[$post_id]);
        session()->put('cart', $post);
        return redirect()->back()->with('successAddCart', 'Успешно Удалено');

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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
