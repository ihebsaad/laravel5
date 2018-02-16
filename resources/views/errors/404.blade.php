@extends('template')

@section('contenu')
<style type="text/css">
.notfounddiv {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  
  /*
  This doesn't work
  margin-left: -25%;
  margin-top: -25%;
  */
  
  width: 40%;
  height: 50%;

  padding: 20px;  
  background: #a5a8ab!important;
  color: white;
  text-align: center;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
}
</style>
<div class="notfounddiv">
    <br>
    <h1 style="color:#464646!important;">Page Not Found</h1>
  <p style="color: #a5a8ab!important;">Sorry, but the page you were trying to view does not exist.</p>
  <a href='#' class="back">Back To Homepage</a>
</div>
@endsection