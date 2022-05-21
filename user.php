<?php
session_start();
if(!isset($_SESSION['loggined']) || $_SESSION['loggined'] !=true)
{
    header('location:index.html');
    exit;
}

include 'login_page/connect.php';

?>





<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php $_SESSION['username']; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/c59ef8aa5a.js" crossorigin="anonymous"></script>
        <style>
            .nav-sign .fa-solid{
                position: relative;
                right:70px;
                top:35px;
            }
            .nav-sign .fa-user{
                font-size:30px;
                position: relative;
                right:10px;
            }
            .nav-sign .status
            {
                padding:5px 15px;
                border-radius:10px;
                background:#5a482e;
            }
            .status ul{
                list-style-type: none;
                display: none;
            }
            .status ul li{
                padding:0px 0px;
                margin:20px 0px;
                cursor: pointer;
            }
            .status ,.active ul{
                display:block;
            }
            .status ,.active ul li a{
                color:white;
            }
            .search{
                margin:10px 0px 10px 0px;
                
                text-align: center;
                /* justify-content: center; */
                display: none;
                font-size: 30px;
                position: relative;
                /* top:8px; */
                /* left:10px; */
                cursor: pointer;
            }
            .search input[type='text']{
                width: 50%;
                height:40px;
                font-size: 20px;
            }
           
            .search.active{
                display:block;
            }
            .btn{
                width: 40px;
                height: 40px;
                position: relative;
                bottom:2px;
            }
        </style>
    </head>
    <body>
    

        <header>
            <div class="navbar">
                <nav>
                    <div class="logo">
                        <img src="img/logo.png" alt="logo">
                    </div>
                    <div class="nav-tabs">
                        <a href="user.php">Home</a>
                        <a href="#">A-Z</a>
                        <a href="#">Latest Added</a>
                    </div>
                    <div class="nav-sign">
                        <i class="fa-solid fa-magnifying-glass" onclick="search_anime()" ></i>
                            <div class="status" onclick="st()" >
                                <i class="fa fa-user" aria-hidden="true" style="cursor: pointer;"></i>
                                <?php  echo $_SESSION['username'];?> 
                                <ul>
                                    <li><a href="login_page/logout.php" style="color:white;text-decoration:none">Log Out</a>
                                       </li>
                                </ul>
                            </div>             
                    </div>
                </nav>

            </div>
            
        </header>
        <div class="search">
            <form action="" method="GET">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search..."><button type="submit"  class="btn"> <i class="fa-solid anime_search fa-magnifying-glass" ></i></button>
            </form>
        </div>
    
        <div id="container">
            <div class="anime-container">
                <ul>
                    <!-- searching -->
                    <?php 
                        if(isset($_GET['search']))
                        {
                        
                            $filtervalue = $_GET['search'];
                            $sql = "SELECT * FROM anime WHERE nam LIKE '%$filtervalue%'";
                            $result = mysqli_query($con, $sql);

                            if(mysqli_num_rows($result)>0)
                            {
                                foreach($result as $items)
                                {   echo '<form action="" method="POST">';
                                    echo '<li>';
                                    echo '<div class="img">';
                                    echo '<a href="anime.php" title="'.$items['nam'].'">';
                                    echo '<img src="img/'.$items['src'].'" alt="'.$items['nam'].'">';   
                                    echo '<div class="shadow"></div>';        
                                    echo '</a>';      
                                    echo '</div>';    
                                    echo '<p class="name">'.$items['nam'].'</p>';
                                    echo '</li>';
                                    echo '<form>';
                                }
                            }
                            else{
                                echo "no record found...";
                            }
                        }
                    ?>
                    <!-- searching stop -->

                    <?php
                    if(!isset($_GET['search']))
                    {
                        $sql = "SELECT * FROM anime";
                        $result = mysqli_query($con,$sql);
                        $num = mysqli_num_rows($result);
                   
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<li>';
                        echo '<div class="img">';
                        echo '<a href="anime.php" title="'.$row['nam'].'">';
                        echo '<img src="img/'.$row['src'].'" alt="'.$row['nam'].'">';   
                        echo '<div class="shadow"></div>';        
                        echo '</a>';      
                        echo '</div>';    
                        echo '<p class="name">'.$row['nam'].'</p>';
                        echo '</li>';
                    }
                    }
                    
                    
                    ?>
                    
                </ul>
            </div>
            
        </div>

        <div id="footer">
                    <footer>
                    <div class="footer-content">
                        <!--add all information -->
                        <h3>Contact</h3>
                        <p>Kksolanki1503@gmail.com</p>
                        <ul class="socials">
                            <li><a href="https://www.facebook.com/profile.php?id=100080652278777"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/kamlesh60048057"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCYUaN_dMAHxSOR6uLdAhjzw"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/kamlesh-kumar-63b674238/"><i class="fa fa-linkedin-square"></i></a></li>
                        </ul>
                        <div class="footer-bottom">
                            <!-- add all information -->
                            <p>copyright &copy;2022 <a href="#">Animix</a>  </p>
                        </div>
                    </div>
                    </footer>
        </div>



        <script>
            function st(){
                    document.querySelector(".status").classList.toggle("active");
                    }

            function search_anime(){
                document.querySelector(".search").classList.toggle("active");
            }
        </script>
    </body>
</html>