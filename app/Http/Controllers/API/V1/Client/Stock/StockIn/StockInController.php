<?php

namespace App\Http\Controllers\API\V1\Client\Stock\StockIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInController extends Controller
{
    public function index()
    {
        try {

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $allProduct = [];
            $products   = Product::with('main_image')->where('shop_id',$merchant->shop->id)->get();
            foreach($products as $product){
                $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
                $allProduct[] = $product;
            }
            return response()->json([
                'success' => true,
                'data' => $allProduct,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }

    public function show($id)
    {
        try {

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $product  = Product::with('main_image')->where('id', $id)->where('shop_id',$merchant->shop->id)->first();
            
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }

    public function update(ProductRequest $request)
    {
        //return $request->all();
        try {

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            DB::beginTransaction();
            $oldData = NULL;
            $product  = Product::with('main_image')->where('id', $request->product_id)->where('shop_id',$merchant->shop->id)->first();
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }

           
            $oldData = $product;
        

            if ($request->stock_quantity != null) {
                $product->product_qty = ($product->product_qty + $request->stock_quantity);
            }
            
            $product->save();

            $updatedProduct = Product::with(['main_image'])->where('id', $request->product_id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Stock In successfully',
                'data' => $updatedProduct,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }
}
