<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["cartItems"])) {
    $_SESSION["cartItems"] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="stytle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="main">
<!--        <div class="logo">-->
            <img class="logo" src="sunshine.png">
<!--        </div>-->
        <ul>
            <li><a href="../Signinup/afterlogin.php"><?php      
                if(isset($_SESSION["yourname"])){
                echo "<span>Hi,",$_SESSION['yourname']," !</span>";
                }else{
                echo "<span><a href='../Signinup/loginIndex.php'>Login</a></span>";
            }
            ?></a></li>
            <li><a href="../Home/home.php">Home</a></li>
            <li class="active"><a href="../About/About.php" >About</a></li>
            <li><a href="../Signinup/signinup.php">Sign up/in</a></li>
            <li><a href="../project/TravelPlan.php">Travel Plan</a></li>
            <li><a href="../project/accommodation.php">Hotel</a></li>
            <li><a href="../project/attractions.php">Views & Eat</a></li>
        </ul>
        <div class="cart"><a href="../project/ShoppingCart.php"><img src="../project/images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
    </div>
</header>






<!--    <img src="img/top_banner.jpg" width="1530px" height="455px">-->

    <div class="mainBody">
        <h1 style="font-size: 30px">About us</h1>
        <p class="about">
            <img src="img/symbol.png" style="float: right" width="600" height="350">
            Our travel agency was established on September 28, 2020. Our main business is tourism projects in Xi’an, China.
            Our travel agency mainly consists of six members. Yuhan Chen, Haocen Cai, Liu He, Lingjun Zou, Dingwei Guo, Zehui Cao.
        </p>

        <h2 style="font-size: 30px">What you will get from us</h2>
        <p class="getFrom">
            When you explore our website, you'll find travel ideas about your days in Xian. Our website.Our website offers
            a collection of all-inclusive itineraries to guide and inspire you when planning a dream vacation to China and most
            ideas can be customized. <b>A trip with Sunshine Travel Agency is all about you.</b>We want you to travel in China your way.
            Our professional one-on-one travel consultants are here to design travel plans based on your individual
            requirements, interests, and preferred style of travel and accommodation. No matter if you travel as a family, a couple,
            alone, or in a group, Sunshine Travel Agency can arrange a suitable and economical travel deal for all of you.
        </p>

        <h3 style="font-size: 30px">Contact our members</h3>
  </div>




<table>
    <tr>
    <td>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/jamas.jpg" style="width:300px;height:350px;">
                </div>
                <div class="flip-card-back">
                    <h1>Zehui Cao</h1>
                    <p>Email Address: 12345678@gmail.com</p>
                    <p>Tel. Number: 12345678</p>
                    <p>Job Number: 12345678</p>
                    <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>
        </div>
    </td>

    <td>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/pyy.jpg" style="width:300px;height:350px;">
                </div>
                <div class="flip-card-back">
                    <h1>Dingwei Guo</h1>
                    <p>Email Address: 12345678@gmail.com</p>
                    <p>Tel. Number: 12345678</p>
                    <p>Job Number: 12345678</p>
                    <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>
        </div>
    </td>

    <td>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/mj.jpg" style="width:300px;height:350px;">
                </div>
                <div class="flip-card-back">
                    <h1>Liu He</h1>
                    <p>Email Address: 12345678@gmail.com</p>
                    <p>Tel. Number: 12345678</p>
                    <p>Job Number: 12345678</p>
                    <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <p><button>Contact</button></p>
                </div>
            </div>
        </div>
    </td>
</tr>

    <tr>
        <td>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/jcw.jpg" style="width:300px;height:350px;">
                    </div>
                    <div class="flip-card-back">
                        <h1>Haocen Cai</h1>
                        <p>Email Address: 12345678@gmail.com</p>
                        <p>Tel. Number: 12345678</p>
                        <p>Job Number: 12345678</p>
                        <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <p><button>Contact</button></p>
                    </div>
                </div>
            </div>
        </td>

        <td>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/sjl.jpg" style="width:300px;height:350px;">
                    </div>
                    <div class="flip-card-back">
                        <h1>Yuhan Chen</h1>
                        <p>Email Address: 12345678@gmail.com</p>
                        <p>Tel. Number: 12345678</p>
                        <p>Job Number: 12345678</p>
                        <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <p><button>Contact</button></p>
                    </div>
                </div>
            </div>
        </td>

        <td>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/ajln.jpg" style="width:300px;height:350px;">
                    </div>
                    <div class="flip-card-back">
                        <h1>Lingjue Zou</h1>
                        <p>Email Address: 12345678@gmail.com</p>
                        <p>Tel. Number: 12345678</p>
                        <p>Job Number: 12345678</p>
                        <p>Online Time: Monday to Friday 8:00 a.m. to 19:00 p.m. Montreal Time</p>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <p><button>Contact</button></p>
                    </div>
                </div>
            </div>
        </td>
    </tr>

</table>

<div class="lastPart">
    <h4 style="font-size: 30px">Our guid</h4>
    <p>We all know what a crucial role guides play in a tour group. You might even say that tour guides are the most valuable resource of a successful tour company.

        Sunshine Travel Agency has a resourceful network of tour guides. We have guides for English, Italy, Spanish, French, and Indonesia. We promise that we have the most caring,
        patient, knowledgeable and accommodating tour guides.
    </p>
</div>

<div class="askQ">

        <legend>
            <h5>Have a question? Please leave your message below, our experts will help you get the best solutions</h5>
        </legend>

        <div class="contact">
            <form action="process.php" method="post">
            <table>
                <tr>
                    <td class="info">
                        Type of questions:
                    </td>

                    <td>
                        <select class="inputSel" name="type">
                            <option value="time" name="type">Time</option>
                            <option value="ac" name="type">Accommodation</option>
                            <option value="tp" name="type">Travel Plan</option>
                        </select>
                        <br><br>
                    </td>
                </tr>

                <tr>
                    <td class="info">
                        Number of people:
                    </td>

                    <td>
                        <input type="text" id="people" class="input" name="numPeople" placeholder="Number of people traveled"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Number of adult:
                    </td>

                    <td>
                        <input type="name" id="adult" class="input" name="numAdult" placeholder="Number of adult traveled"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Number of children:
                    </td>

                    <td>
                        &nbsp;<input type="name" id="children" class="input" name="numChildren" placeholder="Number of children traveled"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        First Name:
                    </td>

                    <td>
                        <input type="text" id="fname" name="fname" class="input" placeholder="First name"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Last Name:
                    </td>

                    <td>
                        <input type="text" id="lname" name="lname" class="input" placeholder="Last name"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email:
                    </td>

                    <td>
                        <input type="email" name="email" class="input" placeholder="Your valide email address"><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Phone Number:
                    </td>

                    <td>
                        <input type="text" name="phone_number" class="input" placeholder="Your phone number"><br><br>
                    </td>
                </tr>
            </table>


            <p>
                <label>Please leave your message here:<br></label><br>
                <textarea id="tex" name="tex" rows="4" cols="50" class="input" placeholder="Please leave your any special requests here"></textarea>
            </p>

            <button type="submit" value="Submit">Submit</button>

            </form>
        </div>

</div>










</body>
</html>