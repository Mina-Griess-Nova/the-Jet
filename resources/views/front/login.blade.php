@extends('front.layouts.app')

@push('style')
<style>
    .login{
    border-top: 1px solid #C5C5C5;
    border-bottom: 1px solid #C5C5C5;
    background-color: #FAFAFA;
    overflow: hidden;
    padding: 10px;
    color: #535353
}
.form{

    border: 1px solid #CB1104;
    margin:  0 auto;
    padding: 20px 20px 30px
}

@media only screen and (min-width: 800px) {
    .form{
    width: 40%;
    }
}
@media only screen and (min-width: 1200px) {
    .form{
    width: 20%;
    }
}
.form-control{
    width: 80%;
    margin:  0 auto;
    margin-top: 20px;
    margin-bottom: 20px;

}
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


<div class="login">
    <div class="container">
        <h4>login</h4>
    </div>
</div>

<div class="profile mt-4">
    <div class="form">
        <form action="{{ url('/otbokhly/login') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="email" type="text" placeholder="email" style="width: 90%;margin-bottom: 8px">
                <input class="form-control" name="password" type="password" placeholder="password" style="width: 90%">
                <a  href="#" class="forget_pss float-right">Forgot password</a>
            </div>
            <div class="row mt-5" style="justify-content: center">
                <button type="submit" class="btn  waves-effect"> sign in</button>
            </div>
        </form>
        <hr>

        <div class="create_new_account">
            <span>New to DishDivvy?</span> <a href="{{ url('/otbokhly/register') }}" > Create Account</a>
        </div>
        <p class="text-center">By tapping Continue or Create Account, I agree to DishDivvy’s <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
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
