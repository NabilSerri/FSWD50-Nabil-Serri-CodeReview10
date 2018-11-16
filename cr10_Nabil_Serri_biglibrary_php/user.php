<?php require_once 'actions/db_connect.php'; ?>

 <?php
ob_start();
session_start();


// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: start.php");
 exit;
}

// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>

<html>

<head>

    <title>PHP CRUD</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
    <div id="navBar">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
                    
                
                <a class="navbar-brand text-warning" href="index.php">CodeReview 10</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                                  <a class="nav-link btn btn-outline-warning" href="#" data-toggle="modal" data-target="#exampleModalCenter4"> Add New Book <span class="sr-only">(current)</span></a>
                                  
                </li>
                 -->
                 <!-- <a href="create.php">
                    <button type="button" class="btn btn-outline-warning">
                        Add New Book
                    </button>
                                 </a> -->
                </ul>
                
                
                <!-- <a href="log_in.php">
                    <button type="button" class="btn btn-outline-warning">
                        log in
                    </button>
                </a> -->
                <!-- <a href="register.php">
                    <button type="button" class="btn btn-outline-warning">
                        register
                    </button>
                </a> -->
                <!-- </div> -->
            </div>
            </div>
            </nav>
            </div>
            </div>
            <div id="hero" class="container">
                <h5 class="text-right text-sucsses"> Hi <?php echo $userRow['userName']; ?>
            
           <a href="logout.php?logout">Sign Out</a></h5>
                <div class="row mb-2">


            <?php

            $sql = "
            select * from media
            INNER JOIN `authors` on  media.fk_Authors = authors.Author_id 
            INNER JOIN publisher on  media.fk_Publisher=publisher.Publisher_id
            "
            ;
            
                $result = $connect->query($sql);
                $i=0;
                if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                
            /*echo $key["Author_name"]."<br>";*/
            $desc = $row["short_description"];
            echo '
            <div class="col-md-6 my-4">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">ISBN code: '.$row["ISBN_code"].'
                        </strong>
                        <h3 class="mb-0 text-danger">
                        '.$row["title"].'
                        </h3>
                    <div class="mb-1 text-muted">'.$row["publish_date"].'</div>
                    <div>type: '.$row["type"].'</div>
                    <div> status: '.$row["status"].'</div><hr> 
                    <a class="text-info" href="#" data-toggle="modal" data-target="#exampleModalCenter3'.$i.'">
                    Show description
                    </a>
                    <a class="text-info" href="#" data-toggle="modal" data-target="#exampleModalCenter1'.$i.'">
                    Publisher info
                    </a>
                    <a class="text-info" href="#" data-toggle="modal" data-target="#exampleModalCenter2'.$i.'">
                    Author info
                    </a>

<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter1'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Publisher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Publisher name: '.$row["Publisher_name"].'<br>
            Publisher adress: '.$row["Publisher_adress"].'<br>
            Publisher size: '.$row["Publisher_size"].'<br>
        </div>
        <div class="modal-footer">
        
        </div>
        </div>
    </div>
    </div>



<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Author</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Author name: '. $row["Author_name"].'<br>
            Author surname: '.$row["Author_surname"].'<br>
        </div>
        <div class="modal-footer">
        
        </div>
        </div>
    </div>
    </div>
<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter3'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">description</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        '.$row["short_description"].'
        </div>
        <div class="modal-footer">
        
        </div>
        </div>
    </div>
    </div>
    </div>
    <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" src="'.$row["image"].'" data-holder-rendered="true" style="width: 240px; height: 320px;">

    </div>
    
    </div>
    

   ';
   $i++;
    }

            } else {

                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

            }

            ?>


             </div>
         </div>


          
  
        
  

<?php ob_end_flush(); ?>

        



 


