<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   padding-top: 10px;
   background-color: #ebebeb;
   border-top: 5px solid #a5a8ab;
   color: #464646;
   text-align: center;
   box-shadow: 2px 0px 8px #ebebeb;
}
</style>

<div class="footer">
  <p>Iristel © 2018</p>
</div>
<!-- Bootstrap core JavaScript
================================================= -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- script for selectable ui -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #feedback { font-size: 1.4em; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 500px; }
  #selectable li { margin: 10px; padding: 10px; padding-top: 10%; float: left; width: 225px; height: 200px; font-size: 4em; text-align: center; border-radius: 1rem!important; cursor: pointer;}
  #selectable li p {font-size: 16px;}
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

 $( function() {
    $( "#selectable" ).selectable();
  } );
</script>