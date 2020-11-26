@extends('layouts.index')

@section('main')

    
<form class="text-center border border-light p-5" action="{{ url('employees', ['id'=>$employee->id]) }}" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}

    <p class="h4 mb-4">Edit Employee</p>

    
  
     <!-- Name -->
     <input type="text" name="f_name"  class="form-control mb-4"  value="{{ $employee->first_name }}">
     <input type="text" name="l_name"  class="form-control mb-4" value="{{ $employee->last_name }}">
    
      
    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" value="{{ $employee->email }}" >

    <!-- Phone number -->
    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $employee->phone }}" >

 {{ method_field('PUT') }}
   
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Edit</button>


</form>
@endsection