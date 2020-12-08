<?php
include "public.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>attractions</title>
<link rel="stylesheet" type="text/css" href="css/roll.css">
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
      <li class="active"><a href="attractions.php">Views & Eat</a></li>
    </ul>
    <div class="cart"><a href="ShoppingCart.php"><img src="images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
  </div>
  <div class="container" id="container">
    <div class="content" id="content">
      <div class="slider-img" id="slider" > <a href="javascript:;"> <a href="#bell" id="positiondiv"><img src="images/bell tower.jpg" alt="bell tower" id="xianimg" class="xianimg"></a> </a> </div>
    </div>
    <div class="btn">
      <div class="left" id="left"> <a href=" ###"><img class="butt" src="images/arrow-left.png"></a> </div>
      <div class="right" id="right"> <a href=" ###"><img class="butt" src="images/arrow-right.png"></a> </div>
    </div>
    <div class="dot">
      <ul id="ul" class="dotul">
        <li class="lit" class="active">
        </li>
        <li class="lit"></li>
        <li class="lit"></li>
        <li class="lit"></li>
        <li class="lit"></li>
      </ul>
    </div>
  </div>
</header>

<div style="margin-top: 200px;margin-left: 100px;">
    <embed src="video/video.mp4" width="800" height="496">
</div>
    <form action="" method="post" class="dark-matter"  enctype="multipart/form-data" onsubmit="return check_share()">
        <h1>Share The
            <span>Beautiful scenery or Delicious food you think</span>
        </h1>
        <label>
            <span>Title:</span>
            <input id="name" type="text" name="name" placeholder="title" />
        </label>
        <label>
            <span>Price:</span>
            <input id="price" type="text" name="price" placeholder="price" />
        </label>
        <label>
            <span>Image :</span>
            <input id="image" type="file" name="file" />
        </label>

        <label>
            <span>Overview :</span>
            <textarea id="overview" name="overview" placeholder="brief introduction"></textarea>
        </label>
        <label>
            <span>Category :</span><select name="category">
                <option value="scenery">scenery</option>
                <option value="food">food</option>
            </select>
        </label>
        <label>
            <span> </span>
            <input type="submit" class="button" value="Share" />
        </label>
    </form>

<div id="div" class="main">

    <h1>Scenic spot sharing</h1>
    <?php
    foreach ($str_arr_scenery as $k=>$v){
        ?>
        <div id="terracotta">
            <h2><?=$v[2]; ?></h2>
            <img src="images/<?=$v[5]; ?>"
                 alt="terracotta" width="50%" height="50%">
            <h3 style="color: red">Overview</h3>
            <p><?=$v[3]; ?></p>
            <h3 style="color: red">Price</h3>
            <p>C$ <?=$v[1]; ?></p>
            <button onclick="add(<?=$v[0]; ?>)" style="height: 40px;width:240px;font-size: 25px;background-color: black;color: red">add to shopping car</button>
        </div>
  <br/>
  <br/>
        <?php } ?>
  <h1>Traditional foods</h1>
    <?php
    foreach ($str_arr_food as $k=>$v){
    ?>
    <div id="terracotta">
        <h2><?=$v[2]; ?></h2>
        <img src="images/<?=$v[5]; ?>"
             alt="terracotta" width="50%" height="50%">
        <h3 style="color: red">Overview</h3>
        <p><?=$v[3]; ?></p>
        <h3 style="color: red">Price</h3>
        <p>C$ <?=$v[1]; ?></p>
        <button onclick="add(<?=$v[0]; ?>)" style="height: 40px;width:240px;font-size: 25px;background-color: black;color: red">add to shopping car</button>
    </div>
    <br/>
    <br/>
    <?php } ?>

</div>
<script type="text/javascript" src="js/roll.js"></script>
<script>
    function check_share() {
        var name = document.getElementById('name').value;
        var price = document.getElementById('price').value;
        var image = document.getElementById('image').value;
        var overview = document.getElementById('overview').value;
        if (!name || !image || !overview){
            alert('Please fill in the necessary information');
            return false;
        }
    }
    function add(id) {
        window.location.href = "ShoppingCart.php?bookId="+id;
    }
</script>
</body>
</html>
<?php
print_r($_POST);
print_r($_FILES);
if (isset($_POST['name'])){
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 20480000) && in_array($extension, $allowedExts))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            Header("attractions.php");
            die();
        }
        else
        {
            if (file_exists("images/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);

            }
            $name = $_POST['name'];
            $price = $_POST['price'];
            $overview = $_POST['overview'];
            $category = $_POST['category'];
            $file = "data/share.txt";
            $myfile = fopen($file, 'a+');
            $data = array();
            $i = 0;
            while(! feof($myfile))
            {
                $str = fgets($myfile);
                $data[$i] = explode('|', $str);
            }
            $id = $data[$i][0];
            if ($id){
                $id = $id + 1;
            }else{
                $id = 3001;
            }
            fwrite($myfile,"\r\n");
            fwrite($myfile,$id);
            fwrite($myfile,"|");
            fwrite($myfile,$price);
            fwrite($myfile,"|");
            fwrite($myfile,$name);
            fwrite($myfile,"|");
            fwrite($myfile,$overview);
            fwrite($myfile,"|");
            fwrite($myfile,$category);
            fwrite($myfile,"|");
            fwrite($myfile,$_FILES["file"]["name"]);
            fwrite($myfile,"|");
            fclose($myfile);
            echo "
                <script>
                alert('share success!')
                </script>
                ";
            Header("attractions.php");
        }
    }
    else
    {
        echo "非法的文件格式";
        Header("attractions.php");
        die();
    }
}