<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class DashboardController extends Controller
{
    

    public function __construct()
    {
        
    } 

    public function index()
    {

        $data['title']   = "Dashboard";
        $data['menuInfo']  = DB::table('menu')->where(array())->get();

    	return view('common.dashboardPage', $data);
    }


    public function dashboard()
    {
    	return 'Welcome to Dashboard';
    }

    public function menuManage()
    {
        $data['menuInfo']  = DB::table('menu')->where(array())->get();
    	return $data;
    }

    public function menuList(Request $request)
    {
        $where             = [];

        if (isset($request->name))
            $where[] = ['name', 'like', '%' . $request->name . '%'];

        
       
       
        $data['menuList']  = DB::table('menu')->where($where)->get();
        return $data;
    }






    public function menuCreate(Request $request)
    {

       $data  =  ['name' => $request->input('name'),  'route' => $request->input('route'), 'templateUrl' => $request->input('templateUrl'), 'dataUrl' => $request->input('dataUrl'), 'actionUrl' => $request->input('actionUrl'), 'status' => $request->input('status')];
      if(!empty($request->input('id'))){
          DB::table('menu')->where(array('id' => $request->input('id')))->update($data);
      }else{
           DB::table('menu')->insert($data);   
      }

     $output['success'] = array('title' => 'Success', 'message' => 'Data successfully updated');

      return response($output);
        
    	

    }

    public function itemCreate(Request $request)
    {

       $data  =  ['itemOrder' => $request->input('itemOrder'),  'itemName' => $request->input('itemName'), 'price' => $request->input('price')];
      if(!empty($request->input('id'))){
          DB::table('item_manage')->where(array('itemId' => $request->input('id')))->update($data);
      }else{
           DB::table('item_manage')->insert($data);   
      }

     $output['success'] = array('title' => 'Success', 'message' => 'Data successfully updated');

      return response($output);
        
        

    }

    public function itemList()
    {
        $data['itemList']  = DB::table('item_manage')->where(array())->paginate(2);
        return $data;
    }



    public function menuDelete(Request $request)
    {
                          
        DB::table('menu')->where(array('id' => $request->input('id')))->delete();
    }

    

    public function delete( $id)
    {
        DB::table('menu')->where(array('id' => $id))->delete();
    }

    public function gridInfo()
    {
        $data['fileList']  = DB::table('file_upload')->where(array())->get();
        return $data;
    }

 
    

    public function fileList()
    {
        $data['fileList']  = DB::table('file_upload')->where(array())->get();
        return $data;
    }

    public function fileUpload(Request $request)
    {

       $data  =  ['image' => $request->input('myFile')];
      /*if(!empty($request->input('id'))){
          DB::table('item_manage')->where(array('itemId' => $request->input('id')))->update($data);
      }else{
           DB::table('item_manage')->insert($data);   
      }*/

       DB::table('file_upload')->insert($data); 
    
     $output['fileData']   = $request->all(); 
     $output['success'] = array('title' => 'Success', 'message' => 'Data successfully updated');

      return response($output);
        
        

    }

















}
