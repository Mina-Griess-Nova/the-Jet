@extends('front.layouts.app')

@push('style')
<style>
.register{
    border-top: 1px solid #C5C5C5;
    border-bottom: 1px solid #C5C5C5;
    background-color: #FAFAFA;
    overflow: hidden;
    padding: 10px;
    color: #535353
}
.form-control{
    width: 80% !important;
    margin:  0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-bottom: 8px

}
.form{
border: 1px solid #CB1104;
margin:  0 auto;
padding: 20px 20px 30px
}
@media only screen and (min-width: 800px) {
    .form{
    width: 40%;

}}
@media only screen and (min-width: 1200px) {
    .form{
    width: 20%;

}}



button{
    border: 1px solid #CB1104 !important;
    color: #CB1104 !important;
    margin:  0 auto;
}
.forget_pss{
    color: #aaaeb3;
    text-decoration: underline
}
.create_new_account{
    text-align: center;
    margin-bottom: 40px;
    margin-top: 25px
}
.create_new_account a{
    color: #CB1104;
    text-decoration: underline

}
.text-center{
    font-size: 12px;
    padding: 20px
}
.text-center a{
    color: #aaaeb3;
    text-decoration: underline
}
</style>

@endpush


@section('content')


<div class="register">
    <div class="container">
        <h4>register</h4>
    </div>
</div>

<div class="profile mt-4">
    @include('backend.partials.errors')
    <div class="form">
        <form action="{{ url('otbokhly/checkregister') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name">
                <input class="form-control" name="email" type="text" placeholder="Email">
                <input class="form-control" name="phone" type="text" placeholder="Phone number">
                {{-- <div class="col-12 col-sm-12"> --}}
                    <select  name="city" class="selectpicker mt-3 form-control"   data-live-search="true"   style="width:50%;paddind:2px">
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                    </select>
                {{-- </div> --}}
                <input class="form-control" name="password" type="password" placeholder="Password">
                <input class="form-control" name="password_confirmation" type="password" placeholder="password confirmation">
            </div>
            <div class="row mt-5" style="justify-content: center">
                <button type="submit" class="btn  waves-effect"> Create Account</button>
            </div>
        </form>


    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('/front/js/dish.js') }}"></script>


<script>
    $( document ).ready(function() {
        $('.carousel-item').first().addClass( "active" );
});

</script>
@endpush
