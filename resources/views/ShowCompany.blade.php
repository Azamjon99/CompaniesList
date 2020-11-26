@extends('layouts.index')

@section('main')

<div class="container  text-center " >
  <b>{{Session('status')}}</b>
  </div>

<a href="{{ route('companies.create') }}" class="btn btn-info">Create</a>
<a href="{{ url('/logout') }}" class="btn btn-danger"> logout </a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Company id</th>
      <th scope="col">Company logo</th>
      <th scope="col">Company name</th>
      <th scope="col">Company website</th>
      <th scope="col"  >Edit</th>
      <th scope="col"  >Enter</th>
      <th scope="col"  >Delete</th>
   
  
    </tr>
  </thead>
    @foreach($companies as $company)

    <tbody>
      

<tr>
  <th scope="row">
{{$company->id}}
</th>

{{-- Showing logo  --}}
<td><img src="/storage/logos/{{$company->logo}}" style="border-radius: 50%;" width="100" height="100"/>
  
  {{-- Editing logo --}}
  <form action="/company/update/{{$company->id}}"  method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="file" name="logo" id="image"  class="form-control" value="{{$company->logo}}" 
     required>
    
    
    <button type="submit" name="submit" class="btn btn-info">Submit</button>
    </form>

{{-- Showing company name --}}
<td>{{$company->name}}</td>
{{-- website --}}
<td>{{$company->website}}</td>

{{-- Showing action buttons --}}

<td> <a href="{{ route('companies.edit',  $company->id) }}" class="btn btn-info">Edit</a> </td>

<td><a href="{{ route('companies.show',   $company->id) }}" class="btn btn-success">enter</a> </td>

<td><form action="{{ route('companies.destroy',    $company->id) }}" method="post">
  {{ csrf_field() }}


@method('DELETE') 
<button class="btn btn-danger">Delete</button>
</form>

</td>


</tr>
    </tbody>
    @endforeach
</table>

@endsection















