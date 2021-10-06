@extends('layout')

@section('content')


<div class="card mt-5">
    <div class="card-header">
	<a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm">Go Back</a>
		&nbsp;&nbsp;
        Company Update
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
        <form method="post" enctype="multipart/form-data" action="{{ route('companies.update', $companies->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $companies->name }}" />
            </div>
		    <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $companies->email }}" />
            </div>
            <div class="form-group">
                <label for="phone">Website</label>
                <input type="text" class="form-control" name="website" value="{{ $companies->website }}" />
            </div>
		    <div class="form-group">
                <label for="phone">Logo</label>
                <input type="file" class="form-control" name="logo" />
			    <img src="/public/{{ $companies->logo }}" width="100px">
			</div>

            <button type="submit" class="btn btn-block btn-danger">Update</button>
        </form>
    </div>
</div>
@endsection