<?php

namespace App\Http\Controllers\API\V1\Client\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $merchant = User::query()->where('role', 'merchant')->find(auth()->user()->id);
        if (!$merchant) {
            return $this->sendApiResponse('', 'Merchant not found');
        }

        $allOrder = [];
        $orders = Order::with('order_details')->where('shop_id', $merchant->shop->shop_id)->get();
        if (!$orders) {
            return $this->sendApiResponse('', 'Orders not found');
        }
        foreach ($orders as $order) {
            $customer = User::query()->where('id', $order->customer_id)->where('role', 'customer')->first();
            if (!$customer) {
                return $this->sendApiResponse('', 'Customer not found');
            }

            $allOrder[] = [
                'order' => $order,
                'customer' => $customer,
            ];

        }
        return $this->sendApiResponse($allOrder);

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


    public function store(OrderRequest $request)
    {
        try {
            
            DB::beginTransaction();

            $customerID = null;
            $findCustomer = User::where('phone', $request->customer_phone)->where('role', 'customer')->first();

            if ($findCustomer) {
                $customerID = $findCustomer->id;
            }

            if (!$findCustomer) {
                $customer = new User();
                $customer->name = $request->customer_name;
                $customer->role = 'customer';
                $customer->email = 'customer' . rand(1000, 9999) . '@gmail.com';
                $customer->phone = $request->customer_phone;
                $customer->address = $request->customer_address;
                $customer->password = Hash::make(12345678);
                $customer->save();

                $customerID = $customer->id;
            }


            $order = new Order();
            $order->order_no = rand(100, 9999);
            $order->shop_id = auth()->user()->shop->shop_id;
            $order->user_id = auth()->user()->id;
            $order->customer_id = $customerID;
            $order->save();

            //store order details
            foreach ($request->product_id as $key => $val) {

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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $merchant = User::query()->where('role', 'merchant')->find(auth()->user()->id);
        if (!$merchant) {
            return $this->sendApiResponse('', 'Merchant not found');
        }

        $order = Order::with(['order_details'])->where('id', $id)->where('shop_id', $merchant->shop->shop_id)->first();
        if (!$order) {
            return $this->sendApiResponse('', 'Order not found');
        }

        $customer = User::where('id', $order->customer_id)->where('role', 'customer')->first();
        if (!$customer) {
            return $this->sendApiResponse('', 'Customer not found');
        }

        $order['customer'] = $customer;
        return $this->sendApiResponse($order);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function order_status_update(OrderRequest $request)
    {
        try {

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Merchant not Found',
                ], 404);
            }

            $order = Order::with('order_details')->where('id', $request->order_id)->where('shop_id', $merchant->shop->shop_id)->first();
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Order not Found!',
                ], 404);
            }

            $order->order_status = $request->status;
            if ($request->status == 'returned') {
                $order->return_order_date = $request->return_order_date;
                $order->return_order_note = $request->return_order_note;
                foreach ($order->order_details as $details) {
                    $details->product->update([
                        'product_qty' => $details->product->product_qty + $details->product_qty
                    ]);
                }
            }
            $order->save();

            return response()->json([
                'success' => true,
                'msg' => 'Order Status Update Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }

    public function order_invoice(Request $request)
    {


        try {

            $orderID = $request->header('order_id');
            $shopID = $request->header('shop_id');

            $order = Order::with(['order_details', 'customer'])->where('id', $orderID)->where('shop_id', $shopID)->first();
            
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'data' => "Order not found!",
                ], 401);
            }

            return response()->json([
                'success' => true,
                'data' => $order,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
