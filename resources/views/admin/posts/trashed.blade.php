@extends('layouts.app')

@section('content')

	
	<div class="card">
        <div class="card-header">Trashed Posts
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('posts') }}"> Posts </a> </button>  
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
                    <th> Title </th>
                    <th> Options </th>
                </thead>
                
                <tbody>
                    @if($posts->count() > 0)

                        @foreach($posts as $post)
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> <img src="{{ $post->thumbnail }}" alt="img" width="50px" height="50px">  </td>
                            <td> {{ $post->title }} </td>
                            <td> 

                                <a href="{{ route('post.restore', ['id' => $post->id ]) }}"><button class="btn btn-success btn-sm"> Restore </button></a>

                                <a href="{{ route('post.kill', ['id' => $post->id ]) }}"><button class="btn btn-danger btn-sm"> Delete </button></a>
                            </td>
                        </tr>
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