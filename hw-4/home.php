<?php
include 'db_conn.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>IMDb Upgrade</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">

</head>

<?php include('templates/header.php'); ?>


<?php
        if(isset($_GET['search-submit'])){
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $movie_qry = "SELECT * FROM movies WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR director LIKE '%$search%' OR actors LIKE '%$search%'";
        }
        else if(isset($_GET['list'])){
            $search = mysqli_real_escape_string($conn, $_GET['list']);
            $movie_qry = "SELECT * FROM movies WHERE genre LIKE '%$search%'";
        }
        else{
            $movie_qry = "SELECT * FROM movies";
        }
        $movie_res=mysqli_query($conn, $movie_qry);
        $queryRes = mysqli_num_rows($movie_res);

    ?>

    <div class="container all-movies">
        <?php
        if($queryRes <= 0){
            echo "There are no results for";
        }else{
            while($movie_data = mysqli_fetch_assoc($movie_res)){
        ?>

        
            <div class="container-fluid col-sm-12 movie-box">
             
                <?php echo "<a href='moviepage.php?title=".$movie_data['title']."'>"; ?>
                    <img src=<?php echo $movie_data['image']; ?> class="movie-pic">
                <?php echo "</a>"; ?>

                <?php echo "<a href='moviepage.php?title=".$movie_data['title']."' style='text-decoration-color:white'>"; ?>
                <h2 class="title"> <?php echo $movie_data['title'];  ?>  <span class="year"> (<?php echo $movie_data['year']; ?>)  </span></h2>
                <?php echo "</a>"; ?>

                <p class="desc"><?php echo $movie_data['description'];  ?></p>
                <div class="genre"><?php echo $movie_data['genres']; ?></div>
                <div class="duration"><?php echo $movie_data['runtime']; ?></div>

            </div>

        <?php
            }
        }
        ?>

    </div>
    



</body>
</html>
