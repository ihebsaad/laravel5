@extends('layouts.mainlayout')


@section('content')

<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Forgot your password</h1>
<h5>Not a problem. Enter your email adress below and well send you password reset instructions.</h5>
</div>
</section>
<div class="inner-wrapper">
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 center_div">
      <form name="pwd_form" id='pwd_form'>
  <div class="form-group">
    <input type="email" class="form-control" id="useremail" placeholder="Email Address">
  </div>
  <div class="row" style="margin-top: 20px;">
        <div class="col-sm-10 form-group">
            <a href="#">Cancel</a>
        </div>      
        <div class="col-sm-2 form-group" >
            <button type="button" class="btn btn-success btn-round" id="sendpwd" style="float: right;margin-right: 0px;" >Send</button>
        </div>  
   </div>
</form>
    </div>
  </div>
</div>
</div>

@endsection
