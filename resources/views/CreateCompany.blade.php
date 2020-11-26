@extends('layouts.index')

@section('main')

<form class="text-center border border-light p-5" action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <p class="h4 mb-4">Create Company</p>

    
  
     <!-- Name -->
    <input type="text" name="name"  class="form-control mb-4" placeholder="Name">
    
      
    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">
{{-- logo --}}
    <label for="image">Logo</label>
    <input type="file" name="logo" id="image" placeholder="E-mail"  class="form-control mb-4" value="" >

    <!-- Website -->
    <input type="text" name="website" class="form-control" placeholder="website" >
 
   
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Create</button>


</form>
@endsection