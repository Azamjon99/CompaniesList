@extends('layouts.index')

@section('main')

<form class="text-center border border-light p-5" action="{{ route('employees.store', $id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <p class="h4 mb-4">Create Employee</p>

    
  
     <!-- Name -->
    <input type="text" name="f_name"  class="form-control mb-4" placeholder="First Name">
    <input type="text" name="l_name"  class="form-control mb-4" placeholder="Last Name">
    
      
    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Phone number -->
    <input type="text" name="phone" class="form-control" placeholder="Phone" >
 
   
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Create</button>


</form>
@endsection