<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\cart;
use App\Models\order;
use App\Models\order_item;
use App\Models\cart_item;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use App\Models\company;
use App\Models\schedule;
use Illuminate\Support\Str;
use App\Models\user;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;

class HomeController extends Controller
{

    public function index(){
          $companies=company::all();
            $appointments= schedule::count();
            $nurses = user::where('type','nurse')->count();
            $caregivers = user::where('type','caregiver')->count();
            $clients = user::where('type','client')->count();
        return view('index',compact('appointments','nurses','caregivers','clients'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|string|max:20',
            'beds' => 'required|integer|min:1',
            'address' => 'required|string',
            'website' => 'nullable|url',
            'terms' => 'accepted'
        ]);
        // dd("sadg");
        $company = new company();
        $company->name = $validated['facility_name'];
        $company->external_id ="comp_".substr((string) Str::uuid(), 0, 6);
        $company->email = $validated['email'];
        $company->phone = $validated['phone'];
        $company->beds = $validated['beds'];
        $company->address = $validated['address'];
        $company->website = $validated['website'] ?? null;
        $company->save();

        return response()->json(['message' => 'Company registered successfully']);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function affiliate(){
        return view('affiliate');
    }
    public function tradeline(){
        $tradelines = item::simplePaginate(30);
        return view('tradeline',compact('tradelines'));
    }
    public function cart()
    {
        // return session()->all();
        if (session()->has('customer_id')) {
            // dd('refh');
        $c_id=session('customer_id');
       $cart = cart::where('customer_id',$c_id)
                        ->with('cart_items.item')
                        ->where('status','pending')
                        ->first();
        } else {
            $cart = cart::where('external_id', session('cart_token'))
                        ->with('cart_items.item')
                        ->where('status','pending')
                        ->first();
        }

       $cartItems = optional($cart)->cart_items ?? [];

        return view('cart', compact('cart', 'cartItems'));
    }
    // public function addToCart(Request $request)
    // {
    //     $request->validate([
    //         'item_id' => 'required|integer|exists:items,id',
    //         'price' => 'required|numeric',
    //     ]);

    //     $itemId = $request->input('item_id');
    //     $price = $request->input('price');
    //     $customerId = Auth::check() ? Auth::id() : null;
    //     if (!$customerId) {
    //         $externalId = Session::get('cart_token', uniqid());
    //         Session::put('cart_token', $externalId);
    //     } else {
    //         $externalId = uniqid('customer_');
    //     }
    //     $cart = cart::where('external_id', $externalId)
    //                 ->where('customer_id', $customerId)
    //                 ->first();
    //     if (!$cart) {
    //         $cart = new cart();
    //         $cart->external_id = $externalId;
    //         $cart->customer_id = $customerId;
    //         $cart->total_price = 0;
    //         $cart->save();
    //     }
    //     $cartItem = cart_item::where('cart_id', $cart->id)->where('item_id', $itemId)->first();

    //     if ($cartItem) {
    //         $cartItem->price += $price;
    //         $cartItem->save();
    //     } else {
    //         $cartItem = new cart_item();
    //         $cartItem->cart_id = $cart->id;
    //         $cartItem->item_id = $itemId;
    //         $cartItem->price = $price;
    //         $cartItem->save();
    //     }
    //     $cart->total_price += $price;
    //     $cart->save();

    //     return redirect()->route('cart')->with('success', 'Item added to cart.');
    // }
    public function addToCart(Request $request)
    {
        // return session()->all();
        $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'price' => 'required|numeric',
        ]);

        $itemId = $request->input('item_id');
        $price = $request->input('price');
        $customerId = session('customer_id');

            $externalId = session::get('cart_token') ?? uniqid();
            session::put('cart_token', $externalId);

        $cart = cart::where('external_id', $externalId)
                     ->orwhere('customer_id', $customerId)
                     ->where('status','pending')->first();
        if (!$cart) {
            // dd('eed');
            $cart = cart::create([
                'external_id' => $externalId,
                'customer_id' => $customerId,
                'total_price' => 0,
                'status' => "pending",
            ]);
        }
        $cartItem = cart_item::firstOrCreate(
            ['cart_id' => $cart->id, 'item_id' => $itemId],
            ['price' => 0]
        );

        $cartItem->price += $price;
        $cartItem->save();

        // Update the total price of the cart
        $cart->total_price += $price;
        $cart->save();

        // Update the cart item count in session
        $request->session()->put('cart_item_count', $cart->cart_items()->count());

        return redirect()->route('cart')->with('success', 'Item added to cart.');
    }


    public function remove($id)
    {
        $cartItem = cart_item::findOrFail($id);
        $cart = $cartItem->cart;
        $cart->total_price -= $cartItem->price;
        $cart->save();
        $cartItem->delete();

        // $request->session()->put('cart_item_count', $cart->cart_items()->count());

        return redirect()->route('cart')->with('success', 'Item removed from cart.');
    }
    public function showCheckoutPage()
    {
      //return  session()->all();
        if (session('customer_id')) {
         $customerId =session('customer_id');
            $externalId = null;
        } else {
            $customerId = null;
            $externalId = Session::get('cart_token');
        }
        if ($customerId) {
          $cart = cart::where('customer_id', $customerId)->where('status','pending')->with('cart_items.item')->first();
        } else if ($externalId) {
            $cart = cart::where('external_id', $externalId)->where('status','pending')->with('cart_items.item')->first();
        } else {
            $cart = null;
        }

        $customer = customer::find($customerId);
        $cartItems = optional($cart)->cart_items ?? []; // Using null coalescing operator
        $totalPrice = optional($cart)->total_price ?? 0;
        return view('checkout', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'customer'=>$customer
        ]);
    }
    public function store_customer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $pass=uniqid();
        $customer->password=  $pass? bcrypt($pass) : $pass;
        $customer->save();


        if (session('customer_id')) {
            $customerId =session('customer_id');
               $externalId = null;
           } else {
               $customerId = null;
               $externalId = Session::get('cart_token');
           }
           if ($customerId) {
             $cart = cart::where('customer_id', $customerId)->where('status','pending')->first();
           } else if ($externalId) {
               $cart = cart::where('external_id', $externalId)->where('status','pending')->first();
           } else {
               $cart = null;
           }
        if($cart)
        {
            $cart->customer_id=$customer->id;
            $cart->save();
        }
        session()->put('customer_id',$customer->id);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Information saved successfully!');
    }

    public function checkout()
    {
        if (session('customer_id')) {
            $customerId =session('customer_id');
               $externalId = null;
           } else {
               $customerId = null;
               $externalId = Session::get('cart_token');
           }
           if ($customerId) {
             $cart = cart::where('customer_id', $customerId)->where('status','pending')->with('cart_items.item')->first();
           } else if ($externalId) {
               $cart = cart::where('external_id', $externalId)->where('status','pending')->with('cart_items.item')->first();
           } else {
               $cart = null;
           }
           $customer = customer::find($customerId);
           $cartItems = optional($cart)->cart_items ?? []; // Using null coalescing operator
           $totalPrice = optional($cart)->total_price ?? 0;


        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $customer->name,
                    ],
                    'unit_amount' => $totalPrice*100, // amount in cents (e.g., 2000 for $20.00)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
          $cart = cart::where('customer_id', session('customer_id'))->where('status','pending')->with('cart_items.item')->first();
        $order=new order();
        $order->customer_id=$cart->customer_id;
        $order->order_no=$cart->external_id;
        $order->total_price=$cart->total_price;
        // $order->deliveredDate=date('Y m d H:i:s');
        if($order->save())
        {
            foreach($cart->cart_items as $item)
            {
                $order_item=new order_item();
                $order_item->order_id=$order->id;
                $order_item->item_id=$item->item_id;
                $order_item->price=$item->price;

                $order_item->save();
            }

        }
        $cart->status="completed";
        $cart->save();
        $customer = customer::find(session('customer_id'));
        $tradeline="TradelineEnvy";
        Mail::to($customer->email)->send(new PaymentSuccessMail($customer->name,$order->total_price,$tradeline));
        session::pull('cart_token');
        session::pull('cart_item_count');
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }


}

