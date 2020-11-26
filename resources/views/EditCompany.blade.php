@extends('layouts.index')

@section('main')

    
<form class="text-center border border-light p-5" action="{{ url('companies', ['id'=>$company->id]) }}" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Edit Company</p>

    
  
     <!-- Name -->
    <input type="text" name="name"  class="form-control mb-4" placeholder="Name" value="{{ $company->name }}">
    
      
    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" value="{{ $company->email }}">

   


    <input type="text" name="website" class="form-control" placeholder="website" value="{{ $company->website }}" >
 {{ method_field('PUT') }}
   
    
    <button class="btn btn-info my-4 btn-block" type="submit">Edit</button>


</form>
@endsection