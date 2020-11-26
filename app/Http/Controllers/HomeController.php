<?php

namespace App\Http\Controllers;

use App\Http\Requests\Req;
use App\Models\CompaniesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

public function update(Request $request, $id){
    $this->validate($request,[
        'logo' => 'required|file|image|max:50000'
        ]);

if($request->hasFile('logo')){
    $company=CompaniesList::find($id);

    $exists=Storage::disk('local')->exists("public/logos/". $company->logo);
    if($exists){
        Storage::delete("public/logos/". $company->logo);

    } else{
echo "it is wrong";
    }

    $logoNameEx= $request->file('logo')->getClientOriginalExtension();
        
    $logoNam= str_replace(" ", "", $company->name);
    
    $logo= $logoNam. "." .$logoNameEx;
    
    //        Storage::disk('local')->put('public/product_images/'.$name1, 'Contents');
    $request->logo->storeAs('public', $logo);
    

$arrayToUpdate=array('logo'=>$logo);

DB::table("companies_lists")->where('id', $company->id)->update($arrayToUpdate);

return redirect()->route('companies.index')->with('status', 'Company Logo updated');  

}


    else{
    $error="NO image was selected";
    echo $error;
        
    }


}
}
