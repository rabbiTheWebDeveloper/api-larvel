<?php

namespace App\Http\Controllers\API\V1\Client\SalesTarget;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesTargetRequest;
use App\Models\SalesTarget;
use App\Models\User;
use DB;


class SalesTargetController extends Controller
{
    public function sales_target()
    {
        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            $salesTarget  = SalesTarget::where('user_id', $merchant->id)->first();
            if (!$salesTarget) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Sales Target not Found!',
                ], 404);
            }


            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>   $salesTarget,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }


    public function sales_target_update(SalesTargetRequest $request)
    {
        try {
            
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            $salesTarget = SalesTarget::where('user_id', $merchant->id)->first();
            if (!$salesTarget) {
                $target = new SalesTarget();
                $target->shop_id = auth()->user()->shop->id;
                $target->user_id = auth()->user()->id;
                $target->daily = $request->daily;
                $target->weekly = $request->weekly;
                $target->monthly = $request->monthly;
                $target->save();
              
                return response()->json([
                    'success' => true,
                    'msg' => 'Sales target updated successfully',
                    'data' =>  $target,
                ], 200);
            }

            $salesTarget->daily = $request->daily;
            $salesTarget->weekly = $request->weekly;
            $salesTarget->monthly = $request->monthly;
            $salesTarget->save();

            return response()->json([
                'success' => true,
                'msg' => 'Sales target updated successfully',
                'data' =>   $salesTarget,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }
}
