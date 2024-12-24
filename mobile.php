<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Phones</title>
<style>
    /* sty.css */

/* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: 'Work Sans', sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

/* Container styles */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Navigation styles */
.nav {
    background-color: #ffffff;
    color: #fff;
    padding: 10px 0;
}

.categs {
    list-style: none;
    padding-left: 0;
}

.categs li {
    display: inline-block;
    margin-right: 15px;
}

.categs a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}

/* Phones heading */
h2 {
    text-align: center;
    margin-bottom: 50px;
    color: #fff;
    padding: 0px 0;
    background-color: #333;
}

/* Phones container */
.phones {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background-color: #ffffff;
}

/* Phone card styles */
.card {
    width: 300px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.imgx {
    width: 100%;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.card-body {
    padding: 15px;
}

.name {
    font-size: 1.2em;
    margin-bottom: 5px;
    background-color: #7c7a7a;
}

.price {
    color: #000000;
    font-weight: 600;
    margin-bottom: 10px;
}
#cl {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

#cl:hover {
    background-color: #555;
}
.description {
    margin-bottom: 15px;
}

#buy {
    background-color: #2d2d2d;
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#buy:hover {
    background-color: #2f3030;
}

/* Link styles */
a {
    text-decoration: none;
    color: #313131;
}

a:hover {
    color: #2980b9;
}

</style>

</head>
<body>
    <a href="home.php" id="cl">Home Page</a>

    <div class="container">
        <div class="nav">      
            <ul class="categs"> </ul>
        </div>
        <center>
            <h2>Mobiles</h2>
        </center>
        
        <div class="phones">
            <?php 
            $con = mysqli_connect('localhost','root','','estore');
            $result = mysqli_query($con, "SELECT * FROM products WHERE categ_id = 1");
            
            while($row = mysqli_fetch_array($result)) {
                echo "
                <div class='card'>
                    <img class='imgx' src='$row[image]'>
                    <div class='card-body'>
                    <center>  <h5 class='name'>$row[name]</h5></center>
                    <center> <p class='price'>$row[Price]</p></center>
                    <center>   <p class='description'>$row[description]</p></center>
                        <center> <a href='visa.php'><button id='buy'>Buy</button></a></center>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>

   
</body>
</html>
