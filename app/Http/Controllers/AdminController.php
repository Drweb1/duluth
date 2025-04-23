<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemsImport;
use App\Models\item;
use App\Models\customer;
use App\Models\affiliate;
use App\Models\cart;
use App\Models\order;
use App\Models\special_requirement;
use App\Models\medical_condition;
use App\Models\client_special_requirement;
use App\Models\client_medical_condition;
use App\Models\user;
use App\Models\specialization;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function login(Request $req)
    {
        if($req->isMethod("post")) {
            $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $user = user::where('email', $req->email) ->where('password', $req->password)
                         ->where('type', 'admin')
                         ->first();

            if (!$user) {
                return redirect()->back()->with("login_msg", 'Incorrect Email or Password!');
            }
            Auth::login($user);
            session()->put('admin_id', $user->id);
            $req->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin_login');
    }

    public function dashboard() {
        $medics=medical_condition::all();
        $requires=special_requirement::all();
        $specializations=specialization::all();
        return view('admin.dashboard',compact('requires','medics','specializations'));
    }

    public function customer(Request $request) {
        $query = customer::query();
        if ($request->has('q') && !empty($request->q)) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                  ->orWhere('email', 'like', '%' . $request->q . '%');
            });
        }
        $customers = $query->paginate(20);

        return view('admin.customer', compact('customers'));
    }


    public function orders(Request $request)
    {
        $orders = order::with(['customer', 'item']) ->when($request->status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        })
        ->when($request->customer_name, function ($query) use ($request) {
            return $query->whereHas('customer', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->customer_name . '%');
            });
        })
        ->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function affiliates()
    {
        $affiliates = Affiliate::paginate(20);
        return view('admin.affiliates', compact('affiliates'));
    }

    public function showItems(Request $request)
    {
        $query = $request->input('q');
        $items = item::where(function ($q) use ($query) {
            if ($query) {
                $q->where('owner', 'LIKE', '%' . $query . '%')
                  ->orWhere('type', 'LIKE', '%' . $query . '%');
            }
        })->paginate(20);

        $total = item::count();
        $current = $items->count();

        return view('admin.items', compact('items', 'total', 'current'));
    }


    public function import(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv,xls|max:2048',
            ]);

            $errors = [];

            try {
                Excel::import(new ItemsImport($errors), $request->file('file'));

                if (count($errors) > 0) {
                    return redirect()->back()->with('import_errors', $errors);
                }

                return redirect()->back()->with('success', 'Items imported successfully.');
            } catch (\Exception $e) {

                Log::error('Import Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'An error occurred while importing items: ' . $e->getMessage());
            }
        }

        return view('admin.import_items');
    }
        public function destroy($id)
        {
            $item = item::findOrFail($id);
            if($item->delete()){
            return redirect()->back()->with('success', 'Item deleted successfully.');
            };
            return redirect()->back()->with('error', 'Error deleting item.');
        }
        public function customer_Details($userId)
        {
            $customer = customer::with(['orders', 'cart.cart_Items'])->find($userId);
            return view('admin.customer_details', compact('customer'));
        }
        // public function getOrderItems(Order $order)
        // {
        //     try {
        //         $items = $order->order_items()->with('items:id,owner,type,payment_term,price')->get();
        //         return response()->json(['items' => $items]);
        //     } catch (\Exception $e) {
        //         Log::error('Error fetching order items: ' . $e->getMessage());
        //         return response()->json(['error' => 'Unable to fetch order items.'], 500);
        //     }
        // }
        public function getOrderItems(Order $order)
        {
            try {
                $items = $order->order_items()
                    ->with(['items:id,owner,type,payment_term,price'])
                    ->get();
                $customer = $order->customer()->select('id', 'name', 'email', 'phone_number', 'country', 'city', 'address','postal_code')->first();

                return response()->json(['items' => $items, 'customer' => $customer]);
            } catch (\Exception $e) {
                Log::error('Error fetching order items: ' . $e->getMessage());
                return response()->json(['error' => 'Unable to fetch order items.'], 500);
            }
        }
}
