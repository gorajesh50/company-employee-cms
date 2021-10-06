@extends('layout')

@section('content')

 <h3 style="text-align: center;">Company Operations</h3>
  @if(session()->get('completed'))
    <div class="alert alert-success">
      {{ session()->get('completed') }}  
    </div>
  @endif
  <div class="mt-5">
        <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Go Back</a>
		&nbsp;&nbsp;
        <a href="{{ route('companies.create', '')}}" class="btn btn-primary btn-sm">Add New Company</a>
   </div><br/>  
    <div class="container">
       <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($companies) && $companies->count())
                            @foreach ($companies as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->website }}</td>
									<td><img src="/public/{{ $value->logo }}" width="100px"></td>
                                    <td>
									<a href="{{ route('companies.edit', $value->id)}}" class="btn btn-success btn-sm">Edit</a>
									<form action="{{ route('companies.destroy', $value->id)}}" method="post" style="display: inline-block">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger btn-sm" type="submit">Delete</button>
									</form>	
									</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">There are no data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {!! $companies->links() !!}
            </div>
        </div>

    </div>
@endsection	
	
