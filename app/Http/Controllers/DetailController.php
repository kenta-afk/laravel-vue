<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Detail::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
    // dd($request->all());

    // バリデーションの実行
    $request->validate([
        'detail' => 'required|max:255',
    ]);

    // データベースにデータを保存
    // Request::create(...) ではなく、Detail モデルを使用
    Detail::create([
        'detail' => $request->input('detail'),
    ]);

    
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
    // バリデーションの実行
    $request->validate([
        'detail' => 'required|string|max:255',  // 'detail' フィールドの必須バリデーション
    ]);

    // データの更新
    $detail->detail = $request->input('detail');  // リクエストから取得した'detail'をセット
    $detail->save();  // データベースに保存

    // 更新後のレスポンスを返す
    return response()->json([
        'message' => 'Detail updated successfully!',
        'detail' => $detail
    ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
