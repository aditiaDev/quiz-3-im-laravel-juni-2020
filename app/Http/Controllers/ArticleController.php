<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ArticleModel;
date_default_timezone_set("Asia/Bangkok");

class ArticleController extends Controller
{
    public function index(){
        $data = ArticleModel::get_all();
        $data_user = ArticleModel::get_user_data();
        //dd($data);
        return view('contents.article', compact('data','data_user'));
    }

    public function save_data(Request $request){
        $request->request->add(["created_date"=> Carbon::now(),"modified_date"=> Carbon::now()]);
        $params = $request->all();
        unset($params['_token']);
        //dd($request->all());
        $data = ArticleModel::save_data($params);
        if($data){
            return redirect('/artikel')->with(['success' => 'Save Data Success']);;
        }else{
            return redirect('/artikel')->with(['error' => 'Save Data Error']);;
        }
        
    }

    public function delete_data($id){
        $data = ArticleModel::delete_data($id);
        if($data){
            return redirect('/artikel')->with(['success' => 'Delete Data Success']);;
        }else{
            return redirect('/artikel')->with(['error' => 'Delete Data Error']);;
        }
    }

    public function show($id){
        $data = ArticleModel::get_by_id($id);
        // dd($data);

        $tags = explode(" ",$data[0]->tag);
         return view('contents.show', compact('data','tags'));
    }

    public function edit($id){
        $data = ArticleModel::get_by_id($id);
        return view('contents.edit', compact('id','data'));
    }

    public function update_data($id, Request $request){
        $request->request->add(["modified_date"=> Carbon::now()]);
        $params = $request->all();
        $data = ArticleModel::update_data($id, $params);
        if($data){
            return redirect('/artikel')->with(['success' => 'Update Data Success']);;
        }else{
            return redirect('/artikel')->with(['error' => 'Update Data Error']);;
        }
    }
}
