
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--=============== SWIPER CSS ===============--> 
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

   

</head>
<body>

<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            <i class='bx bxs-watch nav__logo-icon'></i> Rolex
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.html" class="nav__link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="feature.html" class="nav__link">Featured</a>
                </li>
                <li class="nav__item">
                    <a href="product.html" class="nav__link">Products</a>
                </li>
                <li class="nav__item">
                    <a href="new.html" class="nav__link ">New</a>
                </li>
                <li class="nav__item">
                    <a href="contact.php" class="nav__link active-link">Contact</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x' ></i>
            </div>
        </div>
        <div class="nav__btns">
            <!-- Theme change button -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>

            <div class="nav__shop" id="cart-shop">
                <i class='bx bx-shopping-bag' ></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>

<?php
include "connection.php";
// define variables and set to empty values


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameErr = $emailErr = $msgErr = $insertMsg = "";
    $name = $email = $msg = "";
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    

  if (empty($_POST["msg"])) {
    $msgErr = "Message is required";
  } else {
    $msg = test_input($_POST["msg"]);
  }

  if($nameErr == "" || $emailErr =="" || $msgErr == ""){
    $sql = "INSERT INTO users (name, email, msg) VALUES ('$name', '$email', '$msg')";

    if (mysqli_query($conn, $sql)) {
        $insertMsg = "Message Sent Successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  
            <section class="contactSection section container" id="products">
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <?php
                    if(isset($insertMsg)){
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $insertMsg; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    }
                ?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input name="name" type="text" class="form-control" value="<?php if(isset($name)){echo $name;} ?>" id="exampleFormControlInput1" placeholder="Enter Name">
                            <span class="error"> <?php if(isset($nameErr)){echo $nameErr;} ?></span>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                            <span class="error"> <?php if(isset($emailErr)){echo $emailErr;} ?></span>
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Enter Your Message</label>
                            <textarea name="msg" class="form-control" value="<?php if(isset($msg)){echo $msg;} ?>" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <span class="error"> <?php if(isset($msgErr)){echo $msgErr;} ?></span>
                            <input type="submit" value="Send" class="form-control btn-primary mt-4">
                        </div>
                    </form>
            </section>


        <!--==================== NEWSLETTER ====================-->
        <section class="newsletter section container">
            <div class="newsletter__bg grid">
                <div>
                    <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                    <p class="newsletter__description">
                        Don't miss out on your discounts. Subscribe to our email 
                        newsletter to get the best offers, discounts, coupons, 
                        gifts and much more.
                    </p>
                </div>

                <form action="" class="newsletter__subscribe">
                    <input type="email" placeholder="Enter your email" class="newsletter__input">
                    <button class="button">
                        SUBSCRIBE
                    </button>
                </form>
            </div>
        </section>


     <!--==================== FOOTER ====================-->
     <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Our information</h3>

                <ul class="footer__list">
                    <li>1234 - Peru</li>
                    <li>La Libertad 43210</li>
                    <li>123-456-789</li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">About Us</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copy Right</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Road bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Mountain bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Electric</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accesories</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social</h3>

                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-twitter' ></i>
                    </a>

                    <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                </ul>
            </div>
        </div>

        <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
    </footer>

            <!--=============== SCROLL UP ===============-->
            <a href="#" class="scrollup" id="scroll-up"> 
                <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
            </a>
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <!--=============== SWIPER JS ===============-->
            <script src="assets/js/swiper-bundle.min.js"></script>
    
            <!--=============== MAIN JS ===============-->
            <script src="assets/js/main.js"></script>
            
</body>
</html>

