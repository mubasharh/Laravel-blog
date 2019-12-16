@extends('layouts.app')

@section('content')

	
	<div class="card">
        <div class="card-header">Create New User 
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('users') }}"> Users </a> </button>  
            </span>
        </div>

       @include('admin.includes.errors')

        <div class="card-body">
        	<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}

        		<div class="from-group">
        			<label for="Title"> Name </label>
        			<input type="text" name="name" placeholder="Name" class="form-control">
        		</div>
        		<div class="from-group">
        			<label for="thumbnail"> Email </label>
        			<input type="email" name="email"  class="form-control">
        		</div>
                <div class="from-group">
                    <label for="password"> password </label>
                    <input type="password" name="password"  class="form-control">
                </div>
        		<div class="form-control">
        			<div class="text-center">
        				<button class="btn btn-success" type="submit"> Save </button>
        			</div>
        		</div>
        		
        	</form>
        </div>
    </div>

@endsection