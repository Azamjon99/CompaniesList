<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Req;
use App\Http\Requests\ReqEmployee;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReestrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $employees= Employee::paginate(10);
        return view('ShowEmployee', ['employees'=>$employees]);
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
    public function store(ReqEmployee $request, $id)
    {
        $fname=$request->input('f_name');
        $lname=$request->input('l_name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $arrayToCreate=array('first_name'=>$fname,'last_name'=>$lname, 'email'=>$email, 'phone'=>$phone, 'company_id'=>$id  );
            
        $insert=DB::table("employees")->insert($arrayToCreate);
        if($insert){
    
            return redirect()->route('companies.show', $id)->with('status', 'New employee created!');
        }
        else{
echo "Employee is not created";
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
        return view('CreateEmployee', ['id'=>$id]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::find($id);
        return view('EditEmployee', ['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReqEmployee $request, $id)
    {
        $fname=$request->input('f_name');
        $lname=$request->input('l_name');
        $email=$request->input('email');
        $phone=$request->input('phone');
        $arrayToCreate=array('first_name'=>$fname,'last_name'=>$lname, 'email'=>$email, 'phone'=>$phone,  );
            
        $insert=DB::table("employees")->where('id', $id)->update($arrayToCreate);
        if($insert){
            // gettin company id
            $id=Employee::find($id)->company_id;

            return redirect()->route('companies.show', $id)->with('status', 'Employee updated');
        }
        else{
echo "Employee is not updated";
        }
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $employees=Employee::find($id);
      
        $id=$employees->company_id;

        $employees->delete();
        return redirect()->route('companies.show', ['company'=>$id])->with('status', 'Employee deleted!');
    }
}
