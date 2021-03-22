<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends BaseController
{
    private const SUBTOTAL_MIN = 600;
    private const DELIVERY_FEE = 99;

    public function index(Request $request)
    {
        $this->data['orders'] = Order::where('user_id', session()->get('user')->id)->orderByDesc('date')->get();
        $this->data['deliveryFee'] = self::DELIVERY_FEE;

        return view('public.pages.orders', $this->data);
    }

    public function create()
    {
        //
    }

    public function store(OrderRequest $request)
    {
        if(session()->get('user')){
            $totalPrice = 0;
            $cart = $request->input('cartItems');
            $cartItemsCount = $request->input('cartItemsCount');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $note = $request->input('notes');
            $uuid = uniqid() . "_" . substr(md5(time()), 0, 10);

            foreach ($cart as $index => $val){
                $product = Product::find($val);
                $totalPrice += $cartItemsCount[$index] * $product->price()->unit_price;
            }

            if($totalPrice < self::SUBTOTAL_MIN){
                return redirect()->back()->with(['error', "Minimalan iznos za dostavu je 600rsd."]);
            }else{
                try {
                    $order = new Order();
                    $order->address = $address;
                    $order->order_uuid = $uuid;
                    //$order->phone = $phone;
                    $order->user_id = session()->get('user')->id;
                    $order->note = $note;
                    $order->status_id = 1;

                    $order->save();

                    foreach($cart as $key => $val){
                        $order->products()->attach($val, ['quantity' => $cartItemsCount[$key]]);
                    }
                    return redirect()->route('orders.index')->with(['message' => "Porudžbina uspešno kreirana.", 'emptyCart' => true]);

                }catch (\Exception $ex){
                    return redirect()->back()->with(['error' => $ex->getMessage()]);
                }
            }
        }else{
            return redirect()->back()->with(['error', "Morate biti ulogovani."]);
        }
    }

    public function show($id)
    {
        $order = Order::with([
            'products' => function($q){
                $q->with(['prices' => function($q){
                    $q->where('current', true);
                }]);
            }
        ])
            ->where('order_uuid', $id)
            ->firstOrFail();

        return response()->json(['order' => $order]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
