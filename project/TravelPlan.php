<?php
include "public.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Travel Plan</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/TravelPlan.css">
<!--FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Basic Grey */   /* class名称为basic-grey*/
        .basic-grey {
            margin-left:auto;
            margin-right:auto;
            max-width: 500px;
            background: #F7F7F7;
            padding: 25px 15px 25px 10px;
            font: 12px Georgia, "Times New Roman", Times, serif;
            color: #888;
            text-shadow: 1px 1px 1px #FFF;
            border:1px solid #E4E4E4;
        }
        .basic-grey h1 {
            font-size: 25px;
            padding: 0px 0px 10px 40px;
            display: block;
            border-bottom:1px solid #E4E4E4;
            margin: -10px -15px 30px -10px;;
            color: #888;
        }
        .basic-grey h1>span {
            display: block;
            font-size: 11px;
        }
        .basic-grey label {
            display: block;
            margin: 0px;
        }
        .basic-grey label>span {
            float: left;
            width: 20%;
            text-align: right;
            padding-right: 10px;
            margin-top: 10px;
            color: #888;
        }
        .basic-grey input[type="text"], .basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey input[type="date"], .basic-grey input[type="text"], .basic-grey select {
            border: 1px solid #DADADA;
            color: #888;
            height: 30px;
            margin-bottom: 16px;
            margin-right: 6px;
            margin-top: 2px;
            outline: 0 none;
            padding: 3px 3px 3px 5px;
            width: 70%;
            font-size: 12px;
            line-height:15px;
            box-shadow: inset 0px 1px 4px #ECECEC;
            -moz-box-shadow: inset 0px 1px 4px #ECECEC;
            -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
        }
        .basic-grey textarea{
            padding: 5px 3px 3px 5px;
        }
        .basic-grey select {
            background: #FFF url('down-arrow.png') no-repeat right;
            background: #FFF url('down-arrow.png') no-repeat right);
            appearance:none;
            -webkit-appearance:none;
            -moz-appearance: none;
            text-indent: 0.01px;
            text-overflow: '';
            width: 70%;
            height: 35px;
            line-height: 25px;
        }
        .basic-grey textarea{
            height:100px;
        }
        .basic-grey .button {
            background: #E27575;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            box-shadow: 1px 1px 5px #B6B6B6;
            border-radius: 3px;
            text-shadow: 1px 1px 1px #9E3F3F;
            cursor: pointer;
        }
        .basic-grey .button:hover {
            background: #CF7A7A
        }
    </style>
</head>
<body>
<header>
  <div class="main">
      <div class="logo"> <img class="logo" src="images/sunshine.png"> </div>
      <ul>
          <li><a href="../Signinup/afterlogin.php"><?php
              if(isset($_SESSION["yourname"])){
                  echo "<span>Hi,",$_SESSION['yourname']," !</span>";
              }else{
                  echo "<span><a href='../Signinup/loginIndex.php'>Login</a></span>";
              }
              ?></a></li>
          <li class="#"><a href="../Home/home.php">Home</a></li>
          <li><a href="../About/About.php">About</a></li>
          <li><a href="../Signinup/signinup.php">Sign up/in</a></li>
          <li class="active"><a href="TravelPlan.php">Travel Plan</a></li>
          <li><a href="accommodation.php">Hotel</a></li>
          <li><a href="attractions.php">Views & Eat</a></li>
      </ul>
      <div class="cart"><a href="ShoppingCart.php"><img src="images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
  </div>
    <div class="PeopleSize">
        <div>
            <button id="TripDeals" onclick="location.href='#Tripdeals'" type="button" style="font: normal bolder 15px 'Source Sans Pro', sans-serif;">View Trip Deals</button>
        </div>
        <div>
            <button id="Buildplan" onclick="location.href='#Build_plan'" type="button" style="font: normal bolder 15px 'Source Sans Pro', sans-serif;">Build Your Travel Plan</button>
        </div>
    </div>
</header>
<div id="Tripdeals">
  <P style="color:black; font-weight:bolder; margin:2% auto; text-align:center; font-size:35px; font-family:'Source Sans Pro', sans-serif;"> Trip Deals</P>
</div>
<div class="grid-contanier">
<?php
include "data.php";
foreach ($str_arr2 as $str_k=>$str_v){
?>
  <div class="r3c3"> <a class="img" href="#"  alt="Mausoleum of the First Qin Emperor one day trip"/><img src="images/<?php echo $str_v[4] ?>" height="150" width="250"> </a>
    <p style="color:black; font-size:20px;"><?php echo $str_v[1] ?></p>
    <p style="color:black; font-size:20px;">Price: <?php echo $str_v[2] ?></p>
    <p style="font-size:10px; color: red"> &#9733; &#9733; &#9733; &#9733; &#9733;  <?php echo $str_v[3] ?>  reviews</p>
    <button type="submit" class="btn" name="add" onclick="add(<?php echo $str_v[0] ?>)"> Add to cart </button>
  </div>
  <?php }?>
  <div class="empty">
    <p></p>
  </div>
</div>

<hr>
<br>
<P style="color:black; font-weight:bolder; margin:2% auto; text-align:center; font-size:35px; font-family:'Source Sans Pro', sans-serif;"> Travel Insurance</P>
<br>
<div class="grid-contanier2">
  <?php
  foreach ($str_arr1 as $str_k=>$str_v){
?>
    <div class="r1c1"> </a>
      <p style="color:black; font-size:20px;"><?php echo $str_v[1] ?></p>
      <p style="color:black; font-size:20px;">Price: <?php echo $str_v[2] ?> per day</p>
      <p style="font-size:10px";></p>
      <button type="submit"  class="btn" name="add" onclick="add(<?php echo $str_v[0] ?>)"> Add to cart </button>
    </div>
  <?php  } ?>
</div>
<hr>
<div id="Build_plan">
<P style="color:black; font-weight:bolder; margin:2% auto; text-align:center; font-size:35px; font-family:'Source Sans Pro', sans-serif;">Build Your Travel Plan</P>
</div>
<div style="height: 875px">
    <form action="ShoppingCart.php" method="get" class="basic-grey" onSubmit="return check();">
        <h1>Contact Form
            <span>Please fill all the texts in the fields.</span>
        </h1>
        <label>
            <span>Peoples:</span>
            <input id="nums" type="text" name="nums" placeholder="Number of people" />
        </label>
        <label>
            <span>Departure date:</span>
            <input id="date" type="date" name="date" value="Departure date"  />
        </label>
        <label>
            <span>Hotel :</span><select name="hotel">
                <?php
                foreach ($str_h_arr as $str_k=>$str_v){
                ?>
                <option value="<?= $str_v[0]; ?>"><?= $str_v[1]; ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            <span>Trip :</span><select name="trip">
                <?php
                foreach ($str_arr2 as $str_k=>$str_v){
                    ?>
                    <option value="<?= $str_v[0]; ?>"><?= $str_v[1]; ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            <span>Insurance:</span><select name="insurance">
                <option value="0">NOT REQUIRED</option>
                <?php
                foreach ($str_arr1 as $str_k=>$str_v){
                    ?>
                    <option value="<?= $str_v[0]; ?>"><?= $str_v[1]; ?></option>
                <?php } ?>
            </select>
        </label>
        <label>
            <span> </span>
            <input type="submit" class="button" value="Send" />
        </label>
    </form>
</div>
<script type="text/javascript">
  function add(id) {
  window.location.href = "ShoppingCart.php?bookId="+id;
}
function check() {
    var people = document.getElementById('nums').value;
    var date = document.getElementById('date').value;
    if (!people || !date){
        alert('Please fill in the necessary information');
        return false;
    }
}
</script>
</body>
</html>