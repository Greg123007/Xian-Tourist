<?php
include('public.php');

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (isset($_GET['bookId'])) {
    if (count($cart) > 0) {
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $_GET['bookId']) {
                $cart[$i]['quantity'] += 1;
                $_SESSION["cartItems"] += 1;
                $exist = true;
            }
        }
    }
    if (!isset($exist)) {
        $bookDetails = getBookDetails($_GET['bookId']);
        array_push($cart, array("id" => $_GET['bookId'], "title" => $bookDetails[0], "price" => $bookDetails[1], "quantity" => 1));
        $_SESSION["cartItems"] += 1;
    }
    $_SESSION['cart'] = $cart;
}
if (isset($_GET['changeBookId'])) {
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id'] == $_GET['changeBookId']) {
            $_SESSION["cartItems"] += ($_GET['quantity'] - $cart[$i]['quantity']);
            $cart[$i]['quantity'] = $_GET['quantity'];
        }
    }
    $_SESSION['cart'] = $cart;
}
if (isset($_GET['deleteid'])) {
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id'] == $_GET['deleteid']) {
            $_SESSION["cartItems"] -= $_GET["num"];
            $cart=array_filter($cart,"delValue");
            sort($cart);
        }
    }
    $_SESSION['cart'] = $cart;
}
function delValue($arr){
    foreach ($arr as $key=>$value){
        if($value==$_GET['deleteid']||$value==""){
            return false;
        }
        return true;
    }
}

if (isset($_GET['nums'])){
    $hotel = $_GET['hotel'];
    $trip = $_GET['trip'];
    $nums = $_GET['nums'];
    $insurance = $_GET['insurance'];
    if ($insurance != 0){
        $insurance = $_GET['insurance'];
    }else{
        $insurance = false;
    }
    for ($i = -1; $i < count($cart); $i++) {
        if ($cart[$i]['id'] == $hotel) {
            $_SESSION["cartItems"] += ($nums - $cart[$i]['quantity']);
            $cart[$i]['quantity'] += $nums;
            $_SESSION['cart'] = $cart;
        }else{
            if ($hotel){
                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {
                        if ($cart[$i]['id'] == $hotel) {
                            $cart[$i]['quantity'] += $nums;
                            $_SESSION["cartItems"] += $nums;
                            $exist_h = true;
                        }
                    }
                    $_SESSION['cart'] = $cart;
                }
                if (!isset($exist_h)) {
                    $bookDetails = getBookDetails($hotel);
                    array_push($cart, array("id" => $hotel, "title" => $bookDetails[0], "price" => $bookDetails[1], "quantity" => $nums));
                    $_SESSION["cartItems"] += $nums;
                }
                $_SESSION['cart'] = $cart;
            }
        }
        if ($cart[$i]['id'] == $trip) {
            $_SESSION["cartItems"] += ($nums - $cart[$i]['quantity']);
            $cart[$i]['quantity'] += $nums;
            $_SESSION['cart'] = $cart;
        }else{
            if ($trip){
                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {
                        if ($cart[$i]['id'] == $trip) {
                            $cart[$i]['quantity'] += $nums;
                            $_SESSION["cartItems"] += $nums;
                            $exist_t = true;
                        }
                    }
                    $_SESSION['cart'] = $cart;
                }
                if (!isset($exist_t)) {
                    $bookDetails = getBookDetails($trip);
                    array_push($cart, array("id" => $trip, "title" => $bookDetails[0], "price" => $bookDetails[1], "quantity" => $nums));
                    $_SESSION["cartItems"] += $nums;
                }
                $_SESSION['cart'] = $cart;
            }
        }
        if ($cart[$i]['id'] == $insurance) {
            $_SESSION["cartItems"] += ($nums - $cart[$i]['quantity']);
            $cart[$i]['quantity'] += $nums;
            $_SESSION['cart'] = $cart;
        }else{
            if ($insurance){
                if (count($cart) > 0) {
                    for ($i = 0; $i < count($cart); $i++) {
                        if ($cart[$i]['id'] == $insurance) {
                            $cart[$i]['quantity'] += $nums;
                            $_SESSION["cartItems"] += $nums;
                            $exist_i = true;
                        }
                    }
                    $_SESSION['cart'] = $cart;
                }
                if (!isset($exist_i)) {
                    $bookDetails = getBookDetails($insurance);
                    array_push($cart, array("id" => $insurance, "title" => $bookDetails[0], "price" => $bookDetails[1], "quantity" => $nums));
                    $_SESSION["cartItems"] += $nums;
                }
                $_SESSION['cart'] = $cart;
            }
        }
    }
}

   if (isset($_GET['clearCart']) && $_GET['clearCart'] == 1) {
                    session_destroy();
                    $_SESSION["cartItems"] = 0;
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopping Cart</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/Shopping Cart.css">
<!--FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
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
      <li><a href="TravelPlan.php">Travel Plan</a></li>
      <li><a href="accommodation.php">Hotel</a></li>
      <li><a href="attractions.php">Views & Eat</a></li>
    </ul>
    <div class="cart"><a href="ShoppingCart.php"><img src="images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
  </div>

</header>
<div class="container">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <caption>
      Your Shopping Cart
      </caption>
      <?php
      if ($_SESSION["cartItems"] > 0) {
      ?>
      <tr>
        <th>Title</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
        <th>Operation</th>
      </tr>
      <?php
        $totalPrice = 0;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $totalPrice += $_SESSION['cart'][$i]["price"] * $_SESSION['cart'][$i]["quantity"];
            $_SESSION["totalPrice"] = $totalPrice;
            ?>
            <tr>
                <td><?= $_SESSION['cart'][$i]["title"] ?></td>
                <td class="nub">
                    <?= $_SESSION['cart'][$i]["quantity"] ?>
                </td>
                <td>$<?= $_SESSION['cart'][$i]["price"] ?></td>
                <td>$<?= $_SESSION['cart'][$i]["price"] * $_SESSION['cart'][$i]["quantity"] ?></td>
                <td><button onclick="update(<?= $_SESSION['cart'][$i]["id"]; ?>, <?= $_SESSION['cart'][$i]["quantity"]; ?>)" style="adding: 5px 15px;background: #000;color: #fff;border-radius: 5px;width: 75px;font-size: 20px">edit</button>
                    <button onclick="delete_cat(<?= $_SESSION['cart'][$i]["id"]; ?>, <?= $_SESSION['cart'][$i]["quantity"]; ?>)" style="adding: 5px 15px;background: #000;color: #fff;border-radius: 5px;width: 75px;font-size: 20px">delete</button>
                </td>
            </tr>

            <?php
        }
        ?>
      <tr class="rst">
        <td colspan="4">You have <?= $_SESSION["cartItems"] ?> items in the cart</td>
        <td>Cart Total:$<?= $totalPrice ?></td>
      </tr> 
      <?php
                } else {
                    echo "<tr><th colspan='5'>Your cart is empty</td></tr>";
                }
                ?>
      <tr class="operation">
        <?php
          if ($_SESSION["cartItems"] == 0) {

            ?>
            <td><button onClick="Continue();">Continue Shopping</button></td>
          <?php 
          } else {
            ?>
            <td><button onClick="Clear();">Clear Cart</button></td>
        <td colspan="3"><button onClick="Checkout();">Proceed to Checkout</button></td>
        <td><button onClick="Continue();">Continue Shopping</button></td>
          <?php }
        ?>
        
      </tr>
    </table>
</div>
</body>
<script>
  function Clear() {
  window.location.href = "ShoppingCart.php?clearCart=1";
}
function Checkout() {
  window.location.href = "checkout.php";
}
function Continue() {
  window.location.href = "TravelPlan.php";
}
  function update(id, nums) {
      var num=prompt("Please enter the quantity you want to change：",nums);
      if (num != null && num != ''){
          window.location.href = "ShoppingCart.php?changeBookId="+id+"&quantity="+num;
      }
  }
  function delete_cat(id, nums) {
      var flag=confirm("Are you sure you want to delete these items？");
      if(flag){
          window.location.href = "ShoppingCart.php?deleteid="+id+"&num="+nums;
      }
  }
</script>
</html>