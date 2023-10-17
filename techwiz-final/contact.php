<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!--  bootstrape link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

   <style>
  #map {
    width: 100%;
    height: 400px;
  }
  input{
    width: 100%;
  height: 40px;
  padding: 5px; 
  box-sizing: border-box;
  }
  
</style>

</head>
<body class="bg-dark">
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a href="./index.html" class="logo navbar-brand ms-3">
                <a class="navbar-brand" href="#">Stream<span style="color:red;">Trace</span></a>
        </a>
</nav>    

<section class=" p-t-104 p-b-116">
    <h1 class="text-light text-center mt-3">Contact Us</h1>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-5 mx-5 ">
                <form method="post">
                    <h4 class="text-center text-light mb-4">
                        Send Us A Message
                    </h4>
                    <div class="form-group mt-3">
                        <div class="input-group ">
                            <input class="" type="text" name="name" placeholder="Your name">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group ">
                            <input class="" type="email" name="email" placeholder="Your Email Address">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group ">
                            <input class="" type="text" name="subject" placeholder="Subject">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="msg" placeholder="How Can We Help?" rows="5"></textarea>
                    </div>

                    <button class="btn btn-danger btn-block mt-3 mb-1">
                        Submit
                    </button>
                </form>
            </div>

            <div class="col-md-6 col-lg-5  text-start p-5 me-5">
                <div class="mb-4">
                    <h5 class=" text-light">
                        Address
                    </h5>
                    <p class=" text-light">
                    <span class="me-2"><i class="fa-solid fa-location-dot"></i></span>    
                     Aptech Shahra-e-Faisal Center, Karachi
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class=" text-light">
                        Lets Talk
                    </h5>
                    <p class=" text-light">
                    <span class="me-2"><i class="fa-solid fa-phone"></i></span>    +1 800 11122233344
                    </p>
                </div>

                <div>
                    <h5 class=" text-light">
                        Sale Support
                    </h5>
                    <p class=" text-light">
                      <span class="me-2"><i class="fa-solid fa-envelope"></i></span>  contact@example.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

	
	
<!-- Map -->
<h1>Map Example</h1>
<div id="map"></div>
    <script>
     // Function to initialize the map
  function initMap() {
    // Create a map object centered at a specific location
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: 24.864834905433984, lng:  67.07500104172138  }, 
      zoom: 12, // Zoom level
    });
    
    // Add a marker to the map
    const marker = new google.maps.Marker({
      position: { lat: 24.864834905433984, lng:  67.07500104172138 }, 
      map: map,
      title: "Karachi",
    });
  }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
</body>
</html>