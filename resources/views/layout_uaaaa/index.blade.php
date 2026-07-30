<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Publishing Company - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}">
    
    <link rel="stylesheet" href="{{asset('website/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
  </head>
  <body>

  	<div class="container-fluid px-md-5  pt-4 pt-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="index.html">Publishing <span>Company</span> <small>Book Publishing Company</small></a>
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="{{ route('books.page') }}" method="GET" class="searchform order-lg-last">

    <div class="form-group d-flex">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search Books or Authors..."
            value="{{ request('search') }}">

        <button type="submit" class="form-control search">
            <span class="fa fa-search"></span>
        </button>

    </div>

</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="https://facebook.com" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="https://twitter.com" target="_blank"" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="https://instagram.com" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="https://dribbble.com" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	        </div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>

<li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>

<li class="nav-item"><a href="{{ route('coming-soon') }}" class="nav-link">Coming Soon</a></li>

<li class="nav-item"><a href="{{ route('top-seller') }}" class="nav-link">Top Seller</a></li>

<li class="nav-item"><a href="{{ route('books.page') }}" class="nav-link">Books</a></li>
<li class="nav-item">
    <a href="{{ route('my.orders') }}" class="nav-link">
        My Orders
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('submissions.index') }}"class="nav-link">
        Submissions
    </a>
</li>

<li class="nav-item"><a href="{{ route('author') }}" class="nav-link">Author</a></li>

<li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>

<li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
@if(Auth::check() && Auth::user()->user_role == 2)


<li class="nav-item">
    <a href="{{ route('winners') }}" class="nav-link">
        Winners
    </a>
</li>
<li class="nav-item">
    <button id="themeToggle" class="btn btn-sm btn-outline-dark ml-2">
        🌙 Dark
    </button>
</li>

@endif

<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown"
       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        🔔
        <span class="badge badge-danger">
            {{ $pendingOrders + $pendingSubmissions }}
        </span>

    </a>

    <div class="dropdown-menu dropdown-menu-right">

        <a class="dropdown-item" href="{{ route('orders.index') }}">
            Pending Orders ({{ $pendingOrders }})
        </a>

        <a class="dropdown-item" href="{{ route('submissions.index') }}">
            Pending Submissions ({{ $pendingSubmissions }})
        </a>

    </div>

</li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    @yield('content')

    
    <footer class="ftco-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">Connect</a></h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Extra Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Affiliate Program</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Business Services</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Education Services</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Gift Cards</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Legal</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-md-12">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
      	</div>
      </div>
    </footer>
	<script>
const btn = document.getElementById('themeToggle');

if(localStorage.getItem('theme') === 'dark'){
    document.body.classList.add('dark-mode');
    btn.innerHTML = "☀ Light";
}

btn.addEventListener('click',function(){

    document.body.classList.toggle('dark-mode');

    if(document.body.classList.contains('dark-mode')){

        localStorage.setItem('theme','dark');

        btn.innerHTML="☀ Light";
    }
    else{

        localStorage.setItem('theme','light');

        btn.innerHTML="🌙 Dark";

    }

});
</script>
	<script src="{{asset('website/js/jquery.min.js')}}"></script>
  <script src="{{asset('website/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('website/js/popper.min.js')}}"></script>
  <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('website/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('website/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('website/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('website/js/google-map.js')}}"></script>
  <script src="{{asset('website/js/main.js')}}"></script>
    <script>
      
    </script>
  </body>
</html>