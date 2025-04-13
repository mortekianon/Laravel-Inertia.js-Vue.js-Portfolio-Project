<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('title')->get();
        return response()->json([
            'status'=>true,
            'message'=>'News found',
            'data'=>$news,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            'title'=>'required',
            'body'=>'required'
        ];

        $validator = Validator::make($request->all(),$validation);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Error',
                'data'=>$validator->errors()
            ]);
        }

        $news = new News;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->image = $request->image;

        $post = $news->save();

        return response()->json([
            'status'=>true,
            'message'=>'News added',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);
        if($news){
            return response()->json([
                'status'=>true,
                'message'=>'News Found',
                'data'=>$news
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'News not Found',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::find($id);

        if(empty($news)){
            return response()->json([
                'status'=>false,
                'message'=>'News not found'
            ]);
        }

        $validation = [
            'title'=>'required',
            'body'=>'required'
        ];

        $validator = Validator::make($request->all(),$validation);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Update Error',
                'data'=>$validator->errors()
            ]);
        }

      
        $news->title = $request->title;
        $news->body = $request->body;
        $news->image = $request->image;

        $post = $news->save();

        return response()->json([
            'status'=>true,
            'message'=>'News Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        if(empty($news)){
            return response()->json([
                'status'=>false,
                'message'=>'News not Found'
            ], 404);
        }

        $post = $news->delete();

        return response()->json([
            'status'=>true,
            'message'=>'News deleted succesfully'
        ]);
    }
}
