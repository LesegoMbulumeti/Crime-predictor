
<?php 

$conn = new mysqli("sql210.epizy.com", "epiz_34121291", "zYvP2EB3S099guV","epiz_34121291_crime_p");
include('./backend/user.php');



$sql = "SELECT * FROM case_info";
$results = mysqli_query($conn, $sql);

$no_of_crimes = mysqli_num_rows($results);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Welcome | Crime Prediction</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img style="width: 4rem; border-radius:25px" src="../assets/logo.PNG" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./frontend/get_pre.php">Crime info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="./frontend/admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./frontend/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="./frontend/add_account.php">Register</a>
        </li>


        <?php 
        if(!empty($_SESSION['fname'])){
          ?>
           
          <li class="nav-item">
          <a class="nav-link"   href="./frontend/user_profile.php">User Profile</a>
        </li>
<?php
        }
        
        ?>


      </ul>
    </div>
  </div>
</nav>

<section style="height: 400px">
<div  class="container-md">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
 

<div class="carousel-inner">
    <div style="text-align: center; padding:0rem 10%; height:442px;" class="carousel-item active">
        
        <div class="tile is-ancestor">
  <div class="tile is-parent">
    <article class="tile is-child box " style="box-shadow:none">
      <img style="height: 400px" src="./assets/undraw_Safe_re_kiil.png" class="d-block w-100" alt="...">
      
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box" style="box-shadow:none">
      <h2 style="font-size: 2.5rem;" class="fw-light">taking the time to recognize the hazard(s) and taking the appropriate steps to protect yourself, your fellow workers, family and friends.</h2>
      <br><br>
      <button class="btn"><a style="color:white" href="./frontend/add_account.php">Register Today</a></button>
    </article>
  </div>

</div>


    </div>
    <div style="text-align:center; padding:0rem 10%; height:442px;" class="carousel-item">
      
    <div class="tile is-ancestor">
  <div class="tile is-parent">
   <article class="tile is-child box" style="box-shadow:none">
      <h2 style="font-size: 2.5rem;" class="fw-light">taking the time to recognize the hazard(s) and taking the appropriate steps to protect yourself, your fellow workers, family and friends.</h2>
      <br><br>
      <button class="btn"> <a style="color:white" href="./frontend/add_account.php">Register Today</a> </button>
    </article>
  </div>
  <div class="tile is-parent">
     <article class="tile is-child box " style="box-shadow:none">
      <img style="height: 400px" src="./assets/undraw_Security_on_re_e491(1).png" class="d-block w-100" alt="...">
    
    </article>
  </div>

</div>

   
    </div>
  
  </div>


  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>


</section>
<br>
<section style="font-size: 3rem; text-align: center">
<div >
<span class="value" akhi="48">0</span> <span >+</span>
</div>
<p style="font-size: 1.5rem;" class="fw-light"">Crimes predicted</p>

</section>



<br>
<section style="text-align: center; padding:0rem 10%">
<p style="font-size: 3rem;" class="fw-light">What are we?</p>

<p style="font-size: 1.5rem;" class="fw-light"> We are a smart crime prediction that can be accessed online. With the use of mathematics and law enforcement, and predictive analytics, we are able to forecast probable and potentially criminal activities in a specific area.</p>

</section>
<br>
<br>

<section style="padding:0rem 10%">
<p style="font-size: 3rem; text-align: center" class="fw-light">Our benefits?</p>
<br>

<div style="text-align: center; color: white" class="tile is-ancestor">
  <div class="tile is-parent">
    <article style="background-color: #2D2727;" class="tile is-child box is-warning">
        <span style="color:white">
        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>
    </span>
      <p class="title" style="color:#454545">24/7 access</p>
      <p style="color:white" class="subtitle">Our system can be accessed anytime, everywhere and at any day of the weeek.</p>
    </article>
  </div>
  <div class="tile is-parent">
    <article style="background-color: #2D2727;" class="tile is-child box is-warning">
    <span style="color:white">
    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-emoji-wink" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z"/>
</svg>
    </span>
      <p class="title" style="color:#454545">Easy to use</p>
      <p style="color:white" class="subtitle">Our system is designed with a great user interface to our users to understand fast.</p>
    </article>
  </div>
  <div class="tile is-parent">
    <article style="background-color: #2D2727;" class="tile is-child box is-warning">
    <span style="color:white">
    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
  <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0zM2 3v7h12V3H2z"/>
</svg>
    </span>
      <p class="title" style="color:#454545">Safes time</p>
      <p style="color:white" class="subtitle">With just a few minutes, you can check our predicted crimes at certain locations.</p>
    
    </article>
  </div>
</div>

</section>

<br><br>



<section style="padding:0rem 10%">
<p style="font-size: 3rem; text-align: center" class="fw-light">Media</p>
<br>

<div style="text-align: center; color: white" class="tile is-ancestor">
  <div class="tile is-parent">
    <article style=";" class="tile is-child box is-warning">
        <img src="./assets/1.jpg">
        </article>
  </div>
  <div class="tile is-parent">
    <article style=";" class="tile is-child box is-warning">
    <img src="./assets/2.jpg">
    </article>
  </div>
  <div class="tile is-parent">
    <article style="" class="tile is-child box is-warning">
    <img src="./assets/3.jpg">
    </article>
  </div>
</div>

</section>



<section style="background-color: blue">
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Crime Predictor</strong> <br> 
      <span>
      <a href="https://www.facebook.com/profile.php?id=100093650438112"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg> </a>
      
      </span>

      <span>
      <a href="https://twitter.com/crimePRED"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg></a>
     
      </span>

      <span>
      <a href="https://www.linkedin.com/feed/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
</svg></a>
      

      </span>
      <br>
      All rights reserved.
       </p>
  </div>
</footer>



</section>
<script>
  const counters = document.querySelectorAll('.value');
const speed = 1000000;

counters.forEach( counter => {
   const animate = () => {
      const value = +counter.getAttribute('akhi');
      const data = +counter.innerText;
     
      const time = value / speed;
     if(data < value) {
          counter.innerText = Math.ceil(data + time);
          setTimeout(animate, );
        }else{
          counter.innerText = value;
        }
     
   }
   
   animate();
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>