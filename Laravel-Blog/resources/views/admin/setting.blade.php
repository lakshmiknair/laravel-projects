@extends('layouts.app')
@section('content')

            <div class="card">
                <div class="card-header">
             Edit Setting
                </div>

                <div class="card-body">
                @include('admin/includes/errors')
                <form method="POST" action="{{route('setting.update',['id' => $setting->id])}}" enctype="multipart/form-data">
                
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Site Name:</label>

                            <div class="col-md-6">
                                <input id="site_name" type="text" class="form-control" name="site_name" value="{{isset($setting)?$setting->site_name:''}}"  autocomplete="name" autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Contact Email:</label>

                            <div class="col-md-6">
                                <input id="contact_email" type="contact_email" class="form-control" name="contact_email" value="{{isset($setting)?$setting->contact_email:''}}"   autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Contact Name:</label>

                            <div class="col-md-6">
                                <input id="contact_name" type="text" class="form-control" name="contact_name" value="{{isset($setting)?$setting->contact_name:''}}"   autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Contact Address:</label>

                            <div class="col-md-6">
                                <input id="contact_address" type="text" class="form-control" name="contact_address" value="{{isset($setting)?$setting->contact_address:''}}"   autofocus>                     
                              </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                UPDATE SETTING
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
