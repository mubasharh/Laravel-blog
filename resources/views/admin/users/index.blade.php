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
                    <th> Image </th>
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
                            <td> <img src="{{ asset($user->profile->avatar) }}" alt="img" width="50px" height="50px" style="border-radius: 50%; ">  </td>
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
                            <td> options</td>
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


<button  class="btn btn-danger" data-catid="5" data-toggle="modal" data-target="#delete">Delete</button>
    <!-- Modal -->
<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="text" name="category_id" id="cat_id" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>




@endsection