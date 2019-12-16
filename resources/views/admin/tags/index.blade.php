@extends('layouts.app')

@section('content')

    
    <div class="card">
        <div class="card-header">Tags
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{route('tag.create', ['id' => '0'])}}"> Add tag </a> </button>  
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
                    <th> tag Name </th>
                    <th> Options </th>
                </thead>
                
                <tbody>
                    @if($tags->count() > 0 )
                        @foreach($tags as $tag)
                        <tr>
                            <td> {{ $tag->id }} </td>
                            <td> {{ $tag->name }} </td>
                            <td> 
                                <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}"> <button class="btn btn-info btn-sm"> Edit </button></a> 
                                <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}"><button class="btn btn-danger btn-sm"> Delete </button></a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center text-danger"> No Data Found</th>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>


@endsection