<?php

namespace App\Http\Controllers\API\V1\Client\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            
            $categories = $this->getCategoryTreeForParentId(0,$merchant->shop->shop_id);

            
            return response()->json([
                'success' => true,
                'data' => $categories,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            $category->shop_id = auth()->user()->shop->shop_id;
            $category->user_id = auth()->user()->id;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();

            if($request->hasFile('category_image')){
                 //store category image
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('images'), $imageName);
            $media = new Media();
            $media->name = '/images/' . $imageName;
            $media->parent_id = $category->id;
            $media->type = 'category';
            $media->save();
           
            $category['image'] = $media->name;
            }
            DB::commit();
           

            return response()->json([
                'success' => true,
                'msg' => 'Category created Successfully',
                'data' =>   $category,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            $category = Category::with('category_image')->where('slug', $slug)->where('shop_id',$merchant->shop->shop_id)->first();
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Category not Found',
                ], 404);
            }

            $categories = $this->getCategoryTreeForParentId($category->id,$merchant->shop->shop_id);

            return response()->json([
                'success' => true,
                'data' =>   $categories,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $category = Category::with('category_image')->find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Category not Found',
                ], 404);
            }

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();
            
            if ($request->has('category_image')) {
                $image_path = $category->category_image->name;
                File::delete(public_path($image_path));

                $imageName = time() . '.' . $request->category_image->extension();
                $request->category_image->move(public_path('images'), $imageName);
                $media = Media::where('type', 'category')->where('parent_id', $category->id)->update([
                    'name' => '/images/' . $imageName
                ]);
            }
            $updatedCategory = Category::with('category_image')->where('id',$id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'category updated successfully',
                'data' =>   $updatedCategory,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::with('category_image')->find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' => 'category not Found',
                ], 404);
            }
            if($category->category_image){
                File::delete(public_path($category->category_image->name));
                $category->category_image->delete();
            }
           
            $category->delete();
            return response()->json([
                'success' => true,
                'msg' => 'category Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    public function getCategoryTreeForParentId($parent_id=0,$shopID)
    {
        $categories = array();

        $result = Category::where('parent_id', $parent_id)->where('shop_id',$shopID)->get();
        foreach ($result as $mainCategory) {
            $category = array();
            $category['id'] = $mainCategory->id;
            $category['name'] = $mainCategory->name;
            $category['slug'] = $mainCategory->slug;
            $category['image'] = $mainCategory->category_image;
            $category['description'] = $mainCategory->description;
            $category['shop_id'] = $mainCategory->shop_id;
            $category['parent_id'] = $mainCategory->parent_id;
            $category['status'] = $mainCategory->status;
            $category['sub_categories'] = $this->getCategoryTreeForParentId($category['id'],$category['shop_id']);
            $categories[] = $category;
        }
        return $categories;
    }
}
