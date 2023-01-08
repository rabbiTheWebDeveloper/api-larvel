<?php

namespace App\Http\Controllers\API\V1\Client\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        try {
            
            $Page = Page::select('id','user_id','shop_id','title','slug','page_content','theme','status')->get();
            
            return response()->json([
                'success' => true,
                'data' => $Page,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        //return $request->all();
        try {
            
            DB::beginTransaction();
            $page = new Page();
            $page->user_id = auth()->user()->id;
            $page->shop_id = auth()->user()->shop->shop_id;
            $page->title = $request->title;
            $page->slug = Str::slug($request->title);
            $page->page_content = $request->page_content;
            $page->theme = $request->theme;
            $page->status = $request->status;
            $page->save();


            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Page created successfully',
                'data' => $page,
            ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();
            if (!$page) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Page not Found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' =>   $page,
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $page  = Page::find($id);
            if (!$page) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Page not Found',
                ], 404);
            }

            $page->title  = $request->title;
            $page->slug = Str::slug($request->title);
            $page->page_content = $request->page_content;
            $page->theme = $request->theme;
            $page->save();
            
            
            $updatedPage = Page::where('id', $id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Page updated successfully',
                'data' => $updatedPage,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
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
            $page  = Page::find($id);
            if (!$page) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Page not Found',
                ], 404);
            }
            
            
            $page->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Page remove successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }
}
