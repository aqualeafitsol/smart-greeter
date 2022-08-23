<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\PlanPackage;
use App\Models\Sticker;
use DataTables;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*  public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->editColumn('created_at', function ($row) {
                            return date('d-m-Y', strtotime($row->created_at));
                        })
                        ->editColumn('name', function ($row) {
                            return $row->getUser->name;
                        })
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.edit.plan',$row['id']).'"><i class="fas fa-edit"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.order.index');
    } */

   public function stickerOrder(){
        $orders = Order::with('sticker')->where('payment_status','COMPLETED')->orderBy('id', 'DESC')->get();
        return view('admin.order.stickerOrder',compact('orders'));
   } 

   public function stickerOrderStatusUpdate(Request $request){
        Order::where('id',$request->id)->update(['delivery_status'=> $request->status]); //order delivery status update
        return response()->json(['success'=>true,'msg'=>' ']);
    //dd($request->all());
   }

   public function stickerStatusUpdate(Request $request){
        Sticker::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>true,'msg'=>' ']);
   }
}
