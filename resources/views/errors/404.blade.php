@extends('template')

@section('contenu')
<style type="text/css">
.notfounddiv {
  position: absolute;
  left: 30%;
  top: 30%;
  padding: 20px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 0.4rem!important;
}
</style>
<div class="notfounddiv" style="background: #ebebeb!important;">
    <br>
    <h1 style="color:#464646!important;">Page Not Found</h1>
  <p style="color: #a5a8ab!important;">Sorry, but the page you were trying to view does not exist.</p>
  <a href='#' class="back">Back To Homepage</a>
</div>
@endsection