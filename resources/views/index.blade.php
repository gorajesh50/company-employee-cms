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
         <a href="{{ route('employees.create', '')}}" class="btn btn-primary btn-sm">Add New Employee</a>
   </div><br/>  
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
							<td># ID</td>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Company</td>
							<td>Action</td>
						</tr>
                    </thead>
                    <tbody>
                        @if (!empty($employee) && $employee->count())
                            @foreach ($employee as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
									<td>{{$value->first_name}}</td>
									<td>{{$value->last_name}}</td>
									<td>{{$value->email}}</td>
									<td>{{$value->phone}}</td>
									<td>{{$value->company_id}}</td>
				<td class="text-center">
                <a href="{{ route('employees.edit', $value->id)}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $value->id)}}" method="post" style="display: inline-block">
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
                {!! $employee->links() !!}
            </div>
        </div>
    </div>
@endsection	
