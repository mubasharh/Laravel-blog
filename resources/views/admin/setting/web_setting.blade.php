@extends('layouts.app')

@section('content')

    
    <div class="card">
        <div class="card-header">UpDate Setting {{ $setting->site_name }} 
            <span style="float:right;"> 
                <button class="btn btn-primary"><a class="text-right text-white" href="{{ route('settings') }}"> settings </a> </button>  
            </span>
        </div>

       @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="setting" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="from-group">
                    <label for="site_name">Site Name </label>
                    <input type="text" name="site_name" value="{{ $setting->site_name }}" placeholder="Site Name" class="form-control">
                </div>
                <div class="from-group">
                    <label for="contact_number"> Contact Number </label>
                    <input type="text" name="contact_number" value="{{ $setting->contact_number }}" placeholder="Contact Number" class="form-control">
                </div>

                <div class="from-group">
                    <label for="Title">Contact Email </label>
                    <input type="text" name="contact_email" value="{{ $setting->contact_email }}" placeholder="Contact Email" class="form-control">
                </div>
                <div class="from-group">
                    <label for="address"> Address</label>
                    <input type="text" name="address" value="{{ $setting->address }}" placeholder="Address" class="form-control">
                </div>
                <div class="form-control">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit"> Update </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

@endsection