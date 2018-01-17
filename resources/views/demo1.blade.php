@extends('layouts.mainlayout')
<style>

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Activate You SIM</h1>
<h5>To begin, enter the Activation PIN on your SIM KIT.</h5>
</div>
</section>

<div class="container-triangle"></div>
<div class="contentcontain">
<div class="container center_div" style=" padding-right: 10px; padding-left: 25px; padding-top: 55px; padding-bottom: 15px;" >
<!--<div class="row">
<div class="form-group col-xs-5 col-lg-offset-5" style="text-align: center;">
		<input type="text" class="form-control form-rounded" placeholder="Your PIN" />
		<button type="button" class="btn btn-primary btn-round">Continue</button>

</div>
</div>
</div>-->
 <form name="registration_form" id='registration_form' class="form-inline">
        <div class="row">
            <div class="form-group col-xs-4">
                <input type="text" class="form-control form-rounded" placeholder="Your PIN" style="width:400px;" />
            </div>

            <div class="form-group col-xs-6">
                <button type="button" class="btn btn-success btn-round">Continue</button>
            </div>
        </div>
 </form>
 <img src="public/findyourpin.jpg" id="myImg"  alt="Find Your PIN" style="width:400px;margin-left:-16px;"/>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

@endsection
