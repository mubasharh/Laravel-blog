@extends('layouts.app')

@section('content')


	
	<div class="card">
        <div class="card-header"> Users 
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('adduser') }}"> Add User </a> </button>  
            </span>
        </div>

        @if(count ($errors) > 0 )

			<ul class="list-group">
				@foreach($errors->all() as $error)
				<li class="list-group-item text-danger">
					{{ $error }}
				</li>
				@endforeach
			</ul>

		@endif


        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Permissions </th>
                    <th> Options </th>
                </thead>
                
                <tbody>
                    @if($users->count() > 0)

                        @foreach($users as $user)
                        @if( $user->id != Auth::user()->id )

                        <tr>
                            <td> {{ $user->id }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td> 
                                @if($user->admin)
                                <a onclick="return confirm('Do you really want to Change Permissions?');" href="{{ route('users.notadmin',['id'=> $user->id ]) }}"> <button class="btn btn-danger btn-xs">
                                        Remove Permission
                                    </button> </a>
                                @else
                                    <a href="{{ route('users.admin',['id' => $user->id ]) }}" onclick="return confirm('Do you really want to Make Admin?');"> <button class="btn btn-success btn-xs" >
                                        Make Admin
                                    </button> </a>
                                @endif

                             </td>
                            <td> 
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('users.destroy', $user->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    @else
                        <tr>
                            <th colspan="4" class="text-center text-danger"> No Data Found</th>
                        </tr>

                    @endif

                </tbody>
            </table>
        </div>
    </div>



@endsection