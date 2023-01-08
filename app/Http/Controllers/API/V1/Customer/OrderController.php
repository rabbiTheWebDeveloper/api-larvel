<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function store(OrderRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $customerID = null;
            $findCustomer = User::where('phone', $request->customer_phone)->where('role', 'customer')->first();

            if($findCustomer){
                $customerID = $findCustomer->id;
            }

            if (!$findCustomer) {
                $customer = new User();
                $customer->name = $request->customer_name;
                $customer->role = 'customer';
                $customer->email = 'customer' . rand(1000, 9999) . '@gmail.com';
                $customer->phone  = $request->customer_phone;
                $customer->address  = $request->customer_address;
                $customer->password = Hash::make(12345678);
                $customer->save();

                $customerID = $customer->id;
            }

            $shop = Shop::where('shop_id', $request->header('shop_id'))->first();
            if (!$shop) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Shop Not Found',
                ], 404);
            }

            $order = new Order();
            $order->order_no = rand(100, 9999);
            $order->shop_id = $shop->shop_id;
            $order->user_id = $shop->user_id;
            $order->customer_id = $customerID;
            $order->save();

            //store order details
            foreach ($request->input('product_id') as $key => $val) {

                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $val;
                $orderDetails->product_qty = $request->product_qty[$key];
                $orderDetails->save();
            }

            $createdOrder = Order::with('order_details')->where('id', $order->id)->first();


            foreach ($createdOrder->order_details as $details) {
                $details->product->update([
                    'product_qty' => $details->product->product_qty - $details->product_qty
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Order created Successfully',
                'data' => $createdOrder,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
