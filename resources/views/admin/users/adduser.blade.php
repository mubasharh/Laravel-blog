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
        	<form action="{{ ($user->id) ? route('users.update', $user->id ) : route('users.store') }}" method="post" enctype="multipart/form-data">

        		{{ csrf_field() }}

                @if($user->id)
                    @method('PUT')
                @else
                    @method('POST')
                @endif

        		<div class="from-group row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
            			<label for="Title"> Name </label>
            			<input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name',$user->name)}}">
                    </div>
        		
            		<div class="col-sm-4 col-md-4 col-lg-4">
            			<label for="thumbnail"> Email </label>
            			<input type="email" name="email"  class="form-control" value="{{ old('email',$user->email)}}">
            		</div>
                    @if($user->id < 1) 
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="password"> password </label>
                        
                        <input type="password" name="password" class="form-control" value="{{ old('password')}}">
                    
                    </div>
                 @endif
                </div>
    			<div class="row text-right mt-2">
                    <div class="col-sm-12 col-md-12 col-lg-12">
        				<button class="btn btn-success" type="submit"> Save </button>
                    </div>
    			</div>
        		
        	</form>
        </div>
    </div>

@endsection