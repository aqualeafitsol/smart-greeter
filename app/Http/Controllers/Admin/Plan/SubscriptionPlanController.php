<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\PlanPackage;
use DataTables;
use DB;

class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubscriptionPlan::all();
            //print_r($data);
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
        
                            $btn = '<a class="edtBtn" href="'.route('admin.edit.plan',$row['id']).'"><i class="fas fa-edit"></i></a>';
                            //$btn  .='&nbsp;&nbsp;&nbsp;&nbsp;';
                            //$btn .= '<a class="delBtn" href="'.route('admin.delete.plan',$row['id']).'"><i class="fas fa-trash-alt"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        
        return view('admin.subscriper_plan.plan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscriper_plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name'  => 'required',
            'price'  => 'required|numeric',
        ]);
        
        DB::beginTransaction();
        try{

            $plan = SubscriptionPlan::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'status' => '1',
                'daily_visit' => (!empty($request->daily_visit) && $request->daily_visit == 'on') ? 1 : 0,
                'platform_used' => (!empty($request->platform_used) && $request->platform_used == 'on') ? 1 : 0,
            ]);
            if(!empty($request->plan_package)){  
                foreach($request->plan_package as $package){
                    $data_package[] = [
                        'name' => $package,
                        'plan_id' => $plan->id,
                    ];
                }
                PlanPackage::insert($data_package); 
            }
            DB::commit();
            return redirect()->route('admin.plan')->with('success','Add Subscriber Plan successfully !');
        }catch( \Exception $e){
            DB::rollback();
            return redirect()->route('admin.plan')->with('error','something went wrong!');
        }

        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $plan = SubscriptionPlan::where('id',$id)->first();
        return view('admin.subscriper_plan.edit',compact('id','plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name'  => 'required',
            'price'  => 'required|numeric',
        ]);
        DB::beginTransaction();
        try{
            SubscriptionPlan::where('id',$request['id'])->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'status' => '1',
                'daily_visit' => (!empty($request->daily_visit) && $request->daily_visit == 'on') ? 1 : 0,
                'platform_used' => (!empty($request->platform_used) && $request->platform_used == 'on') ? 1 : 0,
            ]);
            PlanPackage::where('plan_id',$request['id'])->delete();
            if(!empty($request->plan_package)){  
                foreach($request->plan_package as $package){
                    $data_package[] = [
                        'name' => $package,
                        'plan_id' => $request['id'],
                    ];
                }
                PlanPackage::insert($data_package); 
            }
            DB::commit();
            return redirect()->route('admin.plan')->with('success','Plan updated successfully !');
        }catch( \Exception $e){
            DB::rollback();
            
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
        //
    }
}
