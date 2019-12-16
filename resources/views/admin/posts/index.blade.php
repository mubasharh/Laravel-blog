@extends('layouts.app')

@section('content')

	
	<div class="card">
        <div class="card-header">All Posts 
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('post.create') }}"> Add Post </a> </button>  
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
                    <th> # </th>
                    <th> Image </th>
                    <th> Title </th>
                    <th> category </th>
                    <th> Options </th>
                </thead>
                
                <tbody>
                    @if($posts->count() > 0)

                        @foreach($posts as $post)
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> <img src="{{ $post->thumbnail }}" alt="img" width="50px" height="50px">  </td>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->category->name }} </td>
                            <td> 
                                <a href="{{ route('post.edit', ['id' => $post->id ]) }}"> <button class="btn btn-info btn-sm"> Edit </button></a> 
                                <a href="{{ route('post.delete', ['id' => $post->id ]) }}"><button class="btn btn-danger btn-sm"> Trash </button></a>
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