@extends('layouts.app')

@section('content')

	
<?php
 if($category->id < 1){
    $cat_top = 'Create New Category ';
    $category->id = 0;
    $category->name = '';

}else{
    $cat_top = 'Update Category: '.$category->name;
    $category->id = $category->id;
    $category->name = $category->name;
}

?>

	<div class="card">
        <div class="card-header">{{ $cat_top }}
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('categories') }}"> Categories</a> </button>  
            </span>
        </div>
        
        @include('admin.includes.errors')

        <div class="card-body">
            @if($category->id > 1)
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
            @else
        	<form action="{{ route('category.store') }}" method="post">
            @endif
        		{{ csrf_field() }}

        		<div class="from-group">

        			<label for="name">Category Name</label>
        			<input type="text" name="name" placeholder="Category Name" class="form-control" value="{{ $category->name }}">
        		</div>
        		<div class="from-group" style="margin-top:10px;">
        			<div class="text-center">
        				<button class="btn btn-success btn-lg" type="submit"> Save </button>
        			</div>
        		</div>
        		
        	</form>
        </div> 
    </div>

@endsection