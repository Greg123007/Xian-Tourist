<?php
include "public.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hotel</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/Hotel.css">
<!--FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
 <script src="./js/jquery.js"></script>
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
          <li class="active"><a href="accommodation.php">Hotel</a></li>
          <li><a href="attractions.php">Views & Eat</a></li>
      </ul>
      <div class="cart"><a href="ShoppingCart.php"><img src="images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
  </div>
  <form action="" method="get">
    <div class="PeopleSize">
        <div>
            <label for="day" style="font: normal bolder 15px 'Source Sans Pro', sans-serif;">Keywords:<br>
            </label>
            <input style="height: 28px;font-size: 22px" type="text" id="Keywords" name="keywords"  placeholder="please enter keywords">
        </div>
      <div>
        <label for="People" style="font: normal bolder 15px 'Source Sans Pro', sans-serif;">Guest:</label>
        <br>
        <select style="height: 28px;font-size: 22px" name="people" id="People">
          <option value="0">please choose</option>
          <option value="one-adult" >one adult</option>
          <option value="two-adult" >two adult</option>
          <option value="two-adult-with-children">two adult with children</option>
        </select>
      </div>
      <div>
        <label for="day" style="font: normal bolder 15px 'Source Sans Pro', sans-serif;">Stars:<br>
        </label>
        <input style="height: 15px;font-size: 24px" type="radio" id="starf" name="star" value="★★★★★"><label for="starf" style="font-size: 20px">5★</label> &nbsp;&nbsp;&nbsp;
          <input style="height: 15px;font-size: 24px" type="radio" id="starff" name="star" value="★★★★"><label for="starff" style="font-size: 20px">4★</label> &nbsp;&nbsp;&nbsp;
              <input style="height: 15px;font-size: 24px" type="radio" id="start" name="star" value="★★★"><label for="start" style="font-size: 20px">3★</label> &nbsp;&nbsp;&nbsp;
      </div>
      <div>
        <button id="search" type="submit" style="font: normal bolder 14px 'Source Sans Pro', sans-serif;">search</button>
      </div>
    </div>
  </form>
</header>
<?php
if (isset($_GET['keywords'])){
    $keywords = $_GET['keywords'];
}else{
    $keywords = false;
}
if (isset($_GET['people'])){
    $people = $_GET['people'];
    if ($people == '0'){
        $people = false;
    }
}else{
    $people = false;
}
if (isset($_GET['star'])){
    $star = $_GET['star'];
}else{
    $star = false;
}
if(isset($_GET['order'])){
    $order = $_GET['order'];
}else{
    $order = false;
}

foreach($data_h as $k=>$v){
    $str = explode("|",$v);
    $flag = true;
    if ($keywords) {
        if (!strstr($str[1], $keywords)) {
            $flag = false;
        }
    }
    if ($people){
        if ($people != $str[7]) {
            $flag = false;
        }
    }
    if ($star){
        if ($star != $str[6]){
            $flag = false;
    }
    }
    if ($flag){
            $str_arr[$a] = $str;
            $a++;
        }
}
if ($order){
    if ($order == 'price_asc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[4];
        }
        array_multisort($key_arrays,SORT_ASC,SORT_NUMERIC,$str_arr);
    }
    if ($order == 'price_esc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[4];
        }
        array_multisort($key_arrays,SORT_DESC,SORT_NUMERIC,$str_arr);
    }
    if ($order == 'star_asc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[6];
        }
        array_multisort($key_arrays,SORT_ASC,SORT_STRING,$str_arr);
    }
    if ($order == 'star_esc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[6];
        }
        array_multisort($key_arrays,SORT_DESC,SORT_STRING,$str_arr);
    }
    if ($order == 'likes_esc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[3];
        }
        array_multisort($key_arrays,SORT_DESC,SORT_NUMERIC,$str_arr);
    }
    if ($order == 'likes_asc'){
        foreach($str_arr as $val){
            $key_arrays[]=$val[3];
        }
        array_multisort($key_arrays,SORT_ASC,SORT_NUMERIC,$str_arr);
    }
}
foreach ($str_arr as $str_k=>$str_v){
?>
<div class="Hotel">
  <div class="img"> <a target="_blank" href="https://media-cdn.tripadvisor.com/media/photo-o/0c/f3/70/fb/caption.jpg"> <img src="images/<?php echo $str_v[5] ?>" alt="images" width="300" height="200" align="top"> </a>
    <div class="desc">
      <!-- <p id="1"></p> -->
      <input type="hidden" id="hotelid" name="hotelid" value="<?php echo $str_v[0] ?>">
      <p style="color:#656567;font: normal bolder 30px 'Source Sans Pro', sans-serif;"><?php echo $str_v[1] ?></p>
      <p class="like"> &#9829;</p>
      <?php if ($i == 1) {
        ?><p style="font-size:20px;text-decoration: line-through; "> C$ 56</p>
        <?php
      }
      ?>
      <br/>
      <p style="font-size:40px;text-decoration: underline; color: #FF5733"> C$ <?php echo $str_v[4] ?></p>
      <br/>
      <span style=" height: 20px; width: 80px" ><?php echo $str_v[7] ?></span><button class="add" onclick="add(<?php echo $str_v[0] ?>)">add to cart</button>
      <br>
      <br>
        <p style="color: red"><span>star:</span><?php echo $str_v[6] ?></p>
      <p style="color: #3e80f0"><span>likes:</span><span id="likes"><?php echo $str_v[3] ?></span></p>
      <p><span>address:</span><?php echo $str_v[2] ?> <br/></p>
    </div>
  </div>
</div>
<?php  }?>
<div class="right">
    <div style="text-align: center"><span style="font-size: 36px;color: black;font-style: normal">Sort</span></div>
    <HR style="3 double #987cb9" width="100%" color=#ccc SIZE=3>
  <label style="font-size: 30px" for="people">Price:</label>
    <br>
    <button onclick="price_asc()">Price ↑</button>
    <button onclick="price_esc()">Price ↓</button>
    <br>
    <br>
    <HR style="3 double #987cb9" width="100%" color=#ccc SIZE=3>
    <label style="font-size: 30px" for="star">Star:</label>
    <br>
    <button onclick="star_asc()">Star ↑</button>
    <button onclick="star_esc()">Star ↓</button>
    <br>
    <br>
  <HR style="border:3 double #987cb9" width="100%" color=#ccc SIZE=3>
  <br>
  <label style="font-size: 30px" for="star">Likes:</label>
  <br>
    <button onclick="likes_asc()">Likes ↑</button>
    <button onclick="likes_esc()">Likes ↓</button>
  <br>
  <br>
  <HR style="border:3 double #987cb9" width="100%" color=#ccc SIZE=3>
</div>
</body>

<script type="text/javascript">

function price_asc() {
  window.location.href = "accommodation.php?order=price_asc";
}
function price_esc() {
    window.location.href = "accommodation.php?order=price_esc";
}
function star_asc() {
    window.location.href = "accommodation.php?order=star_asc";
}
function star_esc() {
    window.location.href = "accommodation.php?order=star_esc";
}
function likes_asc() {
    window.location.href = "accommodation.php?order=likes_asc";
}
function likes_esc() {
    window.location.href = "accommodation.php?order=likes_esc";
}
function add(id) {
  window.location.href = "ShoppingCart.php?bookId="+id;
}
    function changeColor()
{
    document.getElementById("button").style.background= "red";
}

 //map

</script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
        var mymap =null;
        </script>
<div id="mapid" style="width: 360px; height: 200px; position:absolute;
      left:1100px;top:350px;"></div>
<p style="color:#656567;font-family:arial;font-size:30px;left:1100px;top:300px; position:absolute;">View Map</p>
<script type="text/javascript">

            //Initialize Map
            var Lat = 34.3194333;
            var Long = 108.9426544;

            //mapid is the id for your div element
            //You can leave the rest as it is
            mymap = L.map('mapid').setView([Lat, Long], 10);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href=" ">OpenStreetMap</a > contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a >, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a >',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

            var marker = L.marker([34.3194333,108.9426544]).addTo(mymap);
            marker.bindPopup("<b>Novotel Xian SCPG </b>").openPopup();

            var marker = L.marker([34.2795641,108.9576984]).addTo(mymap);
            marker.bindPopup("<b>Renaissance Xi'an Hotel</b>").openPopup();


   </script>
<script>
        $(function () {
            $(".like").click(function () {
                $(this).toggleClass('like-A');

            })
        })
    </script>
</html>