<!--<div class="collapse bg-inverse" id="navbarHeader">
<div class="container">
<div class="row">
<div class="col-sm-8 py-4">
<h4 class="text-white">About</h4>
<p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
</div>
<div class="col-sm-4 py-4">
<h4 class="text-white">Contact</h4>
<ul class="list-unstyled">
<li><a href="#" class="text-white">Follow on Twitter</a></li>
<li><a href="#" class="text-white">Like on Facebook</a></li>
<li><a href="#" class="text-white">Email me</a></li>
</ul>
</div>
</div>
</div>
</div>-->
<div class="navbar navbar-inverse bg-inverse">


<div class="container d-flex justify-content-between">
<div class="row" style="width:100%;">
<div class="col-md-3">
<a href="#" class="navbar-brand" style=" padding-bottom: 0px; padding-top: 0px; ">
	<!--<img src="public/logo.svg" class="img-responsive" />-->
		<svg xmlns="http://www.w3.org/2000/svg" id="logo" viewBox="0 0 73.5 21.3" class="logo-small">
                        <style>.st-blue{fill:#006fba}.st1{fill:#a6a9ab}</style>
                        <path d="M40.2.1c0-.1-.2-.1-.3-.1l-1.8.9c-4 1.9-13.7 6.3-17 6.4h-.2c-3.3 0-12-4.2-15.9-6.2C4.3.7 3.6.4 3 0h-.3c-.1.1-.1.2-.1.3l.1.1c.2.1.3.2.5.2.5.4 1.1.7 1.8 1.1 14.2 7.4 16 8.1 16.4 8.1h.1c.9-.6 12.2-6.1 16.8-8.3 1.1-.5 1.8-.8 1.9-.9.1-.2.1-.3 0-.5z" class="st-blue"></path>
                        <path d="M16.5 16.2c.5-.5.7-1.1.7-1.9 0-1-.4-1.8-1.1-2.2-.8-.5-1.9-.7-3.6-.7H5.7v9.9h2.8v-3.9h3.2l3 3.9h3.1l-3.3-4.1c.9-.2 1.5-.5 2-1zm-2.6-.9c-.4.2-1.1.3-2 .3H8.5v-2.5h3.4c1 0 1.6.1 2 .3.3.2.5.5.5 1 0 .4-.2.8-.5.9zM0 11.4h3v9.9H0zm19.5 0h3v9.9h-3zm18.3 1.7H42v8.2h2.9v-8.2h4.3v-1.7H37.8zm-1.7 3.1c-.7-.4-1.7-.6-3.2-.6h-3.7c-.6 0-1.1-.1-1.3-.3-.3-.2-.5-.5-.5-.8 0-.4.2-.8.5-1 .3-.2.9-.3 1.7-.3h6.9v-1.8h-7.3c-1.7 0-2.8.2-3.6.7-.7.5-1.1 1.3-1.1 2.3 0 1 .4 1.7 1.1 2.2.7.4 1.8.6 3.4.6h3.3c.7 0 1.3.1 1.5.3.3.2.5.5.5.9s-.2.7-.5.8c-.3.1-.9.3-1.7.3h-7v1.8h7.5c1.6 0 2.8-.2 3.5-.7.7-.5 1.1-1.3 1.1-2.2-.1-1.1-.4-1.8-1.1-2.2zm29.8 3.4v-8.2h-2.8v9.9h10.4v-1.7zm-14.6-6.9c-1 .8-1.5 2.1-1.5 3.9 0 .9.2 1.7.5 2.3.3.6.9 1.2 1.5 1.6.5.3 1.1.5 1.6.6.6.1 1.5.2 2.5.2h4.7v-1.8H56c-1.1 0-2-.1-2.4-.6-.5-.4-.7-1-.7-1.8h7.7v-1.8h-7.7c.1-.8.3-1.3.9-1.8.5-.4 1.3-.6 2.3-.6h4.6v-1.7H56c-2.1.2-3.7.6-4.7 1.5z" class="st1"></path>
                    </svg>
		
	</a>
	</div>
<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>-->
<div class="col-md-6">
</div>
<div class="col-md-3">

       <div id="navbar-collapse" class="collapse navbar-collapse">
       <?php
 
 if (isset ($_SESSION['access_token']))
 {$style='display:block;';
 }else{
 $style='display:none';}
 if (isset ($_SESSION['username']))
 {
	 $pos = strpos($_SESSION['username'], '/');
$fname=substr($_SESSION['username'],0,$pos);
$lname=substr($_SESSION['username'],$pos+1);
	 $value='Logged in as '.$fname.' '.$lname;

 }else{
 $value='';}
echo'
<ul class="nav navbar-nav navbar-right" id="logoutbtn" style="'.$style.'">
<li><div class="row"><div class="col-sm-9"><h5 id="userinfo">'.$value.'</h5> </div><div class="col-sm-3"><button style="margin-top: 10px;"  onclick="logout();"  class="signin-button login"> Logout</button></div></div></li>

</ul>';
?>
        </div>
        </div><!-- Col -->
</div><!-- Row -->
</div>


</div>
