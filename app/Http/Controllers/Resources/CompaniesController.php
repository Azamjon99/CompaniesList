<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Req;
use App\Models\CompaniesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= CompaniesList::paginate(10);
        return view('ShowCompany', ['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('CreateCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Req $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $website=$request->input('website');
        $logoNameEx= $request->file('logo')->getClientOriginalExtension();

        $logoNam= str_replace(" ", "", $request->input('name'));
        
        $logo= $logoNam. "." .$logoNameEx;
        
        //        Storage::disk('local')->put('public/product_images/'.$name1, 'Contents');
        $request->logo->storeAs('public', $logo);
        
                
        $arrayToCreate=array('name'=>$name,'email'=>$email, 'website'=>$website,  'logo'=>$logo);
            
        $insert=DB::table("companies_lists")->insert($arrayToCreate);
        if($insert){
    
            return redirect('companies')->with('status', 'New Company created');
        }
        else{
echo "Company is not created";
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
        $employees=DB::table('employees')
        ->where('company_id', '=', $id)
        ->paginate(10);
        return view('employees', ['employees'=>$employees, 'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=CompaniesList::find($id);
return view('EditCompany', ['company'=>$company]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Req $request, $id)
    { 
        $name=$request->input('name');
        $email=$request->input('email');
        $website=$request->input('website');

       
        $arrayToUpdate=array('name'=>$name,'email'=>$email, 'website'=>$website, );
    
    $book=    DB::table("companies_lists")->where('id', $id)->update($arrayToUpdate);
    if($book){
    return redirect()->route('companies.index')->with('status', 'Company updated');  
  }else{
      echo 'Change something to update';
  }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompaniesList $company)
    {
        $company->delete();
        return redirect('companies')->with('status', 'Company deleted');
    }
}
