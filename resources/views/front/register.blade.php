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
.form{
    width: 20%;
    border: 1px solid #FD845D;
    margin:  0 auto;
    padding: 20px 20px 30px
}
.form-control{
    width: 80%;
    margin:  0 auto;
    margin-top: 20px;
    margin-bottom: 20px;

}
button{
    border: 1px solid #FD845D !important;
    color: #FD845D !important;
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
    color: #FD845D;
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
    <div class="form">
        <form action="{{ url('otbokhly/register') }}" method="post">
            @csrf
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Name">
                <input class="form-control" name="email" type="text" placeholder="Email">
                <input class="form-control" name="phone" type="text" placeholder="Phone number">
                <input class="form-control" name="password" type="password" placeholder="Password">
                <input class="form-control" name="password_confirmation" type="password" placeholder="password confirmation">
            </div>
            <div class="row mt-5" style="justify-content: center">
                <button type="submit" class="btn  waves-effect"> Create Account</button>
            </div>
        </form>
        <hr>


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
