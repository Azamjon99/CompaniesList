@extends('layouts.index')

@section('main')
<div class="container  text-center " >
  <b>{{Session('status')}}</b>
  </div>
  <a href="{{ route('employees.show', $id) }}" class="btn btn-info">Create</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Employee id</th>
        <th scope="col">Employee name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone number </th>
        <th scope="col">Edit </th>
        
        <th scope="col">Delete</th>
    
      </tr>
    </thead>
      @foreach($employees as $employee)
  
      <tbody>
        
  
  <tr>
    <th scope="row">
  {{$employee->id}}
  </th>
  
  <td>{{$employee->first_name  }} {{ $employee->last_name }}</td>
  <td>{{$employee->email}}</td>
  <td>{{$employee->phone}}</td>
<td> <a href="{{ route('employees.edit',  $employee->id) }}" class="btn btn-info">Edit</a> 
  
  
  <td><form action="{{ url('employees',   ['id' => $employee->id]) }}" method="post">
  @csrf
  @method('DELETE') 
  <button class="btn btn-danger">Delete</button>
  </form></td>
  
  
  
  
  </tr>
      </tbody>
      @endforeach
  </table>
  {{ $employees->links() }}
  
@endsection