@extends('layout')

@section('content')

<div class="card mt-5">
  <div class="card-header">
  <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm">Go Back</a>
		&nbsp;&nbsp;
    Create New Company
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
      <form method="post" enctype="multipart/form-data" action="{{ route('companies.store') }}">
	      <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
		   <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="website">Website</label>
              <input type="text" class="form-control" name="website"/>
          </div>
          <div class="form-group">
              <label for="logo">Logo</label>
              <input type="file" class="form-control" name="logo"/>
          </div>
		  <!--<input type="hidden" class="form-control" name="logo" value="logo"/>-->
		  <button type="submit" class="btn btn-block btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection