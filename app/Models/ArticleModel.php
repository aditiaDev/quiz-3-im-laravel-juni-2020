<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArticleModel{
    public static function get_all(){
        $data = DB::table('article')->get();
        return $data;
    }

    public static function save_data($params){
        $data = DB::table('article')->insert($params);
        return $data;
    }

    public static function get_by_id($id){
        $data = DB::table('article')
                    ->where('id', $id)
                    ->get();
        return  $data;
    }

    public static function update_data($id, $params){
        $data = DB::table('article')
                    ->where('id', $id)
                    ->update([
                        'judul' => $params['judul'],
                        'isi' => $params['isi'],
                        'slug' => $params['slug'],
                        'tag' => $params['tag'],
                        'modified_date' => $params['modified_date']
                    ]);
        return $data;
    }

    public static function delete_data($id){
        $data = DB::table('article')
                    ->where('id', $id)
                    ->delete();

        return $data;
    }

    public static function get_user_data(){
        $data = DB::table('users')
                    ->select('id','nama')
                    ->get();
        return $data;
    }
}