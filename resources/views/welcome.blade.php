@extends('layout')

@section('content')

<div class="card mt-5">
  <div class="card-header">
    Create New Employee
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('employees.store') }}">
	      <div class="form-group">
              @csrf
              <label for="name">First Name</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
		   <div class="form-group">
              <label for="name">Last Name</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone"/>
          </div>
 <div class="form-group">	
<label for="company">Select Company</label> 
<select class="js-states browser-default select2 form-control" name="company_id"  id="company_id">
        <option value="option_select" disabled selected>Select</option>
        @foreach($companies as $company)
            <option value="{{ $company->name }}">{{ $company->name}}</option>
        @endforeach
    </select>		  
</div>		  
		  <button type="submit" class="btn btn-block btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection