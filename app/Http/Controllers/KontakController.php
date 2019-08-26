<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kontak;

class KontakController extends Controller
{
    //
    public function index(){
        $data = kontak::all();

        if(count($data) > 0){  //ngecek apakah data kosong atau enggak
            $res['message'] = "success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "empty!";
            return response($res);
        }
    }

    public function show($id){
        $data = kontak::where('id',$id)->get();

        if(count($data) > 0){
            $res['message'] = "success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "empty!";
            return response($res);
        }
    }

    public function store(Request $request){
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $email = $request->input('email');

        $data = new kontak();
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->email = $email;

        if($data->save()){
            $res["message"] = "success";
            $res["value"] = $data;
            return response($res);
        }
        else{
            $res["message"] = "error! 40040404";
        }

    }


    public function update(Request $request, $id){
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $email = $request->input('email');

        $data = kontak::where('id', $id)->first();
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->email = $email;

        if($data->save()){
            $res['message'] = "success!";
            $res['value'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "error!";
            return response($res);
        }
    }


    public function destroy($id){
        $data = kontak::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "success!";
            $res['value'] = $data;
            return response($res);
        }
        else{
            $res["message"] = "error!";
            return response($res);
        }
    }
}
