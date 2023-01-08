<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $allProduct = [];
            

            $shopId = $request->header('shop_id');
            $products   = Product::with('main_image')->where('shop_id',$shopId)->get();
            foreach($products as $product){
                $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
                $product['other_images']= $other_images;
                $allProduct[] = $product;
            }

            if(count($allProduct) < 1){
                return response()->json([
                    'success' => false,
                    'msg' => 'Product not found',
                ], 400);
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        try {
            
            $shopId = $request->header('shop_id');
            $product  = Product::with('main_image')->where('shop_id',$shopId)->where('slug', $slug)->first();
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
            $product['other_images']= $other_images;
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


    public function search(Request $request)
    {
        try {

           
            $allProduct = [];
            
            $shopId = $request->header('shop_id');
            $query = Product::with('main_image')->where('shop_id',$shopId);
            if($request->search){
                $query->where('product_name', 'LIKE', '%'. $request->search. '%');
            }
            
            $products   = $query->get();
            foreach($products as $product){
                $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
                $product['other_images']= $other_images;
                $allProduct[] = $product;
            }

            if(count($allProduct) < 1){
                return response()->json([
                    'success' => false,
                    'msg' => 'Product not found',
                ], 400);
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
}
