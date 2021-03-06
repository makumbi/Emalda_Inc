<!DOCTYPE html>
<?php
include("sql/SQLFunctions.php");
?>

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<title>Emalda Inc.</title>												<!--Change Title-->
<meta charset="utf-8">
	<!--[if lt IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->																	<!--Edge mode for IE8+-->
<meta name="description" content="describe your page">							<!--Update content-->
<meta name="keywords" content="">												<!--Update content-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">			<!--Scale a webpage to a 1:1 pixel-->
<link rel="shortcut icon" href="img/favicon.ico" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald%7CPT+Sans:400,700,400italic">	<!--Fonts styles-->
<link rel="stylesheet" href="resources/css/bootstrap.min.css">								<!--Bootstrap styles-->
<link rel="stylesheet" href="resources/css/bootstrap-responsive.min.css">						<!--Bootstrap styles-->
<link rel="stylesheet" href="resources/css/colorbox.css">
<!-- <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
<link rel="stylesheet" href="resources/css/retina.css">									<!--Retina styles-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maps.googleapis.com/maps/api/js"></script>                          <!-- Add Google Maps -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
// Validate emails to receive deals
function validateForm() {
    var x = document.forms["userSearch"]["user_query"].value;
    if (x == null || x == "") {
        alert("Please search a product");
        return false;
    }
}
</script>
  <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
	@import url('resources/css/styles.css');                                           /* Custom styles */
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<!-- ************************* NavBar ****************************** -->
<!-- The Nav Bar should always be above the "Emalda Inc." title  -->
<!-- The Nav Bar should get smaller when someone scrolls down, and get bigger when they scroll up  -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
     </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#products">PRODUCTS</a></li>
        <li><a href="#farmers">FARMERS</a></li>
        <li><a href="#contact">CONTACT</a></li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Merchandise</a></li>
            <li><a href="#price">Price</a></li>
            <li><a href="#">Media</a></li>
          </ul>
         </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"> <small>Items:</small></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- ************************* End NavBar *************************** -->
<!--**************************Begin Header*****************************-->
<header class="header-height">
		<div class="jumbotron text-center">
			<div class="position-text">
				<h1>Emalda Inc.</h1>
				<p>We import fresh foods from African farmers to your door step</p>
	 			<form class="form-inline" name="userSearch"
					onsubmit="return validateForm()" method="post" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" class="form-control" placeholder="Search a product" size="50">
					<button type="submit" class="btn btn-danger" name="search" value="Search">Search</button>
				</form>
			</div>
		</div>
</header><!--**************************End Header*****************************-->

<!--**************************Begin Company Products*****************************-->
<section class="action-products">
<!--**************************Begin Company Products*****************************-->
<section class="action-products">
<div id="products" class="container">
<div class="container-fluid text-center">
   <h2>PRODUCTS</h2>
  <div class="products_box">
  <div id='single_product'>
  	<?php
		if(isset($_GET['pro_id'])){

		$product_id = $_GET['pro_id'];


		$get_pro = "SELECT * FROM products WHERE product_id=?";

		// Create prepared statement
		if($stmt = $con -> prepare($get_pro)){

				// bind parameters for makers
				$stmt ->bind_param('i', $product_id);

				// execute query
				$stmt ->execute();

				// get results
				$result = $stmt -> get_result();

				while($row = $result -> fetch_array()){

					$pro_id = $row['product_id'];
					$pro_title = $row['product_title'];
					$pro_price = $row['product_price'];
					$pro_image = $row['product_image'];
					$pro_desc = $row['product_desc'];


				echo "


						<h3>$pro_title</h3>

						<img src='admin_area/product_images/$pro_image' width='400' height='300'>

						<p><b>$ $pro_price</b></p>
						<p>$pro_desc</p>
						<a href='index.php#products' style='float:left;'>Go Back</a>
						<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>


				";

				}

				// free results
				$stmt ->free_result();
				// close statement
				$stmt ->close();
			}
			// close connection
			$con -> close();
		}
	?>
  </div>
  </div>
</div>
</div>
</section>
<!--**************************End Company Products*****************************-->
</section> <!--**************************End Company Products*****************************-->
<!--**************************Begin Our Farmers*****************************-->
<div id="farmers" class="container">
<div class="container-fluid text-center bg-grey">
  <h2>Our Farmers</h2>
  <h4>Farmers that partner with us</h4>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/we-farm-hero[1].jpg" alt="Farmer">
        <p><strong>Bla bla market</strong></p>
        <p>Yes, we built Paris</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/we-farm-hero[1].jpg" alt="Farmer">
        <p><strong>Bla bla market</strong></p>
        <p>We built New York</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="images/Mozambique-small[1].jpg" alt="Farmer">
        <p><strong>Bla bla market</strong></p>
        <p>Yes, San Fran is ours</p>
      </div>
    </div>
</div>
</div>
</div>
<!--**************************End Our Farmers*****************************-->
<!-- *************************What customers say************************* -->
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
<h2>What our customers say</h2>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
    </div>
    <div class="item">
      <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
    </div>
    <div class="item">
      <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- *************************End what customers say********************* -->
<!-- ************************ Product Pricing *************************** -->
<div id="price" class="container">
<div class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basic</h1>
        </div>
        <div class="panel-body">
          <p><strong>20</strong> Lorem</p>
          <p><strong>15</strong> Ipsum</p>
          <p><strong>5</strong> Dolor</p>
          <p><strong>2</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pro</h1>
        </div>
        <div class="panel-body">
          <p><strong>50</strong> Lorem</p>
          <p><strong>25</strong> Ipsum</p>
          <p><strong>10</strong> Dolor</p>
          <p><strong>5</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$29</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
   <div class="col-sm-4">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p><strong>100</strong> Lorem</p>
          <p><strong>50</strong> Ipsum</p>
          <p><strong>25</strong> Dolor</p>
          <p><strong>10</strong> Sit</p>
          <p><strong>Endless</strong> Amet</p>
        </div>
        <div class="panel-footer">
          <h3>$49</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ************************* End Product Pricing *************************** -->
<!-- ************************* Contact Form ********************************** -->
<div id="contact" class="container">
<form action="contact_validation.php" method="post" accept-charset="UTF-8"
		enctype="application/x-www-form-urlencoded" autocomplete="off">
<div class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Fairfax, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> emalda@gmail.com</p>
    </div>
    <div class="col-sm-7">
      <div class="row">

        <div class="col-sm-6 form-group">
          <input class="form-control" id="fname" name="fname" placeholder="First Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="lname" name="lname" placeholder="Last Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit" value="Submit">Send</button>
        </div>
      </div>

    </div>
  </div>
</div>
</form>
</div>
<!-- ************************* End Contact Form ****************************** -->

<!-- Add Google Maps -->
<!-- Set height and width with CSS -->
<div id="googleMap" style="height:510px;width:100%;"></div>

<script>
var myCenter = new google.maps.LatLng(38.8492, -77.3327);

function initialize() {
var mapProp = {
center:myCenter,
 zoom:12,
scrollwheel:false,
draggable:false,
 mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

 marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- **************************** Footer ********************************* -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Theme Made By <a href="#" data-toggle="tooltip" title="Visit makumbi-srv">www.makumbi-srv.com</a></p>
  <div class="copyright pull-center">
	<p>&copy; Emalda Inc., 2016. All rights reserved. </p>
	<p>web by: <a href="#" target="_blank" data-toggle="tooltip">emalda.com</a></p>
	</div>
</footer>
<!-- **************************** End Footer ****************************** -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	<!--Script jQuery-->
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script> 	<!--Script jQuery-->
<script src="js/vendor/jquery-migrate.js"></script>								<!--Script jQuery for old version jQuery-->
<script src="js/vendor/bootstrap.min.js"></script>								<!--Script Bootstrap-->
<script src="js/vendor/jquery.twitter.js"></script>								<!--Script Twitter-->
<script src="js/vendor/jflickrfeed.js"></script>								<!--Script Widget Flikr-->
<script src="js/vendor/jquery.mobile.menu.js"></script>							<!--Script Mobile menu-->
<script src="js/vendor/modernizr.custom.91224.js"></script>						<!--Script Modernizr-->
<script src="js/vendor/jquery.form.js"></script>								<!--Script Send Mail-->
<script src="js/vendor/jquery.bxslider.js"></script>							<!--Script Bxslider Slider-->
<script src="js/vendor/jquery.colorbox.js"></script>
<script src="js/vendor/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="js/vendor/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="js/jquery.timelineG.js"></script>
<script src="js/custom.js"></script>											<!--Script Custom-->

<script>
$(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip();
})

$(document).ready(function() {

//3D-hover for iPhone, iPad, iPod
$('.ch-item').on("mouseenter mouseleave", function(e){
	e.preventDefault();
	$(this).toggleClass('hover');
	});

$('.ch-second-item').on("mouseenter mouseleave", function(e){
	e.preventDefault();
	$(this).toggleClass('hover');
	});


//Bxslider Slider
$('.appic-team').bxSlider({
  pager: false,
  minSlides: 1,
  maxSlides: 4,
  slideWidth: 270,
  slideMargin: 30
});

//Timeline
$( ".timeline" ).timeLineG({
	maxdis:280,
	mindis:100,
	wraperClass:'timeline-wrap'
});

});

$(document).ready(function(){
	  // Add smooth scrolling to all links in navbar + footer link
	  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

	  // Make sure this.hash has a value before overriding default behavior
	  if (this.hash !== "") {

	    // Prevent default anchor click behavior
	    event.preventDefault();

	    // Store hash
	    var hash = this.hash;

	    // Using jQuery's animate() method to add smooth page scroll
	    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
	    $('html, body').animate({
	      scrollTop: $(hash).offset().top
	    }, 900, function(){

	      // Add hash (#) to URL when done scrolling (default click behavior)
	       window.location.hash = hash;
	      });
	    } // End if
	});
})
</script>
</body>
</html>

<!-- Localized -->
