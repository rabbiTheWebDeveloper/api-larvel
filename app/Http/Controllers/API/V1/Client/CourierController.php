<?php

namespace App\Http\Controllers\API\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourierProviderRequest;
use App\Models\MerchantCourier;
use App\Models\Order;
use App\Services\Courier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourierController extends Controller
{
    public function store(CourierProviderRequest $request): JsonResponse
    {
        $courier = MerchantCourier::query()
            ->where('merchant_id', $request->input('merchant_id'))
            ->where('provider', $request->input('provider'))
            ->first();

        if (!$courier) {
            $courier = MerchantCourier::query()->create([
                'merchant_id' => $request->input('merchant_id'),
                'provider' => $request->input('provider'),
                'status' => $request->input('status'),
                'config' => $request->input('config'),
            ]);
        } else {
            $courier->update([
                'status' => $request->input('status'),
                'config' => $request->input('config'),
            ]);
        }
        return response()->json($courier);

    }

    public function sendOrderToCourier(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required',
            'provider' => 'required',
            'order_id' => 'required',
        ]);
        $courier = MerchantCourier::query()
            ->where('merchant_id', $request->input('merchant_id'))
            ->where('provider', $request->input('provider'))
            ->where('status', 'active')
            ->first();

        if (!$courier) {
            throw ValidationException::withMessages([
                'notfound' => 'Invalid provider or merchant',
            ]);
        }
        $credentials = collect(json_decode($courier->config))->toArray();
        $data = Order::query()->find($request->input('order_id'));
        if ($data && $request->input('provider') == MerchantCourier::STEADFAST) {
            $provider = new Courier;
            $response = $provider->createOrder($credentials, $data)->json();

            if($response->status === 200) {
                $data->consignment_id = $response->consignment->consignment_id;
                $data->tracking_code = $response->consignment->tracking_code;
                $data->courier_entry = true;
                $data->save();

                return response()->json(['data' => $data, 'message' => 'Order has been send to'. MerchantCourier::STEADFAST]);
            } else {
                return response()->json(['message' => $response->message]);
            }
        }

        return response()->json(['error' => 'Order not found']);

    }

    public function trackOrder(Request $request)
    {
        $courier = new Courier;

        if ($request->filled('consignment_id')) {
            return $courier->trackOrder('/status_by_cid/' . $request->input('consignment_id'));
        }
        if ($request->filled('invoice')) {
            return $courier->trackOrder('/status_by_invoice/' . $request->input('invoice'));
        }
        if ($request->filled('tracking_code')) {
            return $courier->trackOrder('/status_by_trackingcode/' . $request->input('tracking_code'));
        }
    }
}
