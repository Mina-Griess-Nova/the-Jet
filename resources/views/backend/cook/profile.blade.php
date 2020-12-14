
@extends('backend.layouts.app')

<style>
    .dropzone.dz-clickable{
    cursor:pointer;
    text-align: center;
}
.dropzone {
    background-color: #fbfbfb;
    border: 2px dashed rgba(0, 0, 0, 0.1);
    min-height: 150px;
    border: 2px solid rgba(0,0,0,0.3);
    background: white;
    padding: 20px 20px;
}
.dropzone .dz-message{
    margin: 3em 0;

}
.upload-image{
position: relative;
    width: 80px;
    margin-right: 20px;
    display: none
}
.upload-image img {
    border-radius: 4px;
    height: 80px;
    width: 80px;
}
</style>



@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile of Cooks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cook profile</li>
                    </ul>
                </div>

            </div>

        </div>
        <!-- /Page Header -->

    <!-- Page Content -->
    <div class="content mt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-lg-8 col-xl-9">

                    <form action="{{ url('dashboard/cook/'.$cook->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- Basic Information -->
                        <div class="card">
                            <div class="card-body">
                                @include('backend.partials.errors')

                                <h4 class="card-title">Basic Information</h4>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img mb-3">
                                                    <img id="hidden_img_src" src="{{ asset('/backend/img/cook/'.$cook->images) }}" alt="Cook Image" width="150" style="border-radius: 25%;" >
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" name="profile_image" class="upload" onchange="hidden_img_src.src=window.URL.createObjectURL(this.files[0])">

                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Username </label>
                                            <input type="text" name="name" class="form-control" value="{{ $cook->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control"value="{{ $cook->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" value="{{ $cook->phone }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label>Date of Birth</label>
                                            <input name="birth_date"  type="date" value="{{$cook->date_of_birth ?? old('birth_date') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            Address :
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Title</label>
                                                <input name="title"  type="text" value="{{ $cook->address[0]->title ?? old('title') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>State</label>
                                                <input name="state"  type="text" value="{{ $cook->address[0]->state ?? old('state') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>City</label>
                                                <input name="city"  type="text" value="{{ $cook->address[0]->city ?? old('city')  }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Area</label>
                                                <input name="area"  type="text" value="{{$cook->address[0]->area ?? old('area') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>Floor</label>
                                                <input name="floor"  type="text" value="{{$cook->address[0]->floor ?? old('floor') }}" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mt-3 ">
                                            Availability :
                                        </div>
                                        @php

                                          $date_from=explode(" ",date($cook->work_from));
                                          $date_to=explode(" ",date($cook->work_to));

                                        @endphp
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>From</label>
                                                <input name="work_from"  type="time" value="{{$date_from[1] ?? old('work_from') }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label>To</label>
                                                <input name="work_to"  type="time" value="{{$date_to[1] ?? old('work_to') }}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Basic Information -->

                        <!-- About Me -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">About Me</h4>
                                <div class="form-group mb-0">
                                    <label>info</label>
                                    <textarea name="info" class="form-control"  rows="5" >{{$cook->info ?? old('info') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /About Me -->

                        <div class="submit-section submit-btn-bottom">
                            <button type="submit" class="btn btn-primary submit-btn"> <i class="fas fa-edit"></i> Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
</div>
    <script>

    function removeDiv(elem){
        $(elem).parent('div').remove();
    }


    function removeRow(elem){
        $(elem).closest('.row').remove();
    }


    function showImage(file){


        for (var i = 0; i < file.files['length']; i++) {

            var img='<div class="upload-image" id="upload-image">'+
                        "<img id='img_src'  src="+"'" +window.URL.createObjectURL(file.files[i])+"'"+">"+
                        '<a onClick="removeDiv(this)" href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>'+
                    '</div>';

            $(".upload-wrap").append(img);

            $('.upload-image').css('display','block');
        }


}
    </script>



@endsection




