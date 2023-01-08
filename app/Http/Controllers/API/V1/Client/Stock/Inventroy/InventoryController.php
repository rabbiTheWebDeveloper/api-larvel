<?php

namespace App\Http\Controllers\API\V1\Client\Stock\Inventroy;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class InventoryController extends Controller
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
        

            if ($request->product_name != null) {
                $product->product_name = $request->product_name;
            }
            if ($request->product_code !=null) {
                $product->product_code = $request->product_code;
            }
            if ($request->selling_price != null) {
                $product->price = $request->selling_price;
            }
            
            $product->save();

            if ($request->has('main_image')) {

                $image_path = $product->main_image->name;
                File::delete(public_path($image_path));

                $imageName = time() . '_main_image.' . $request->main_image->extension();
                $request->main_image->move(public_path('images'), $imageName);
                $media = Media::where('type', 'product_main_image')->where('parent_id', $product->id)->update([
                    'name' => '/images/' . $imageName
                ]);
            }
            
            $updatedProduct = Product::with(['main_image'])->where('id', $request->product_id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'inventory updated successfully',
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
