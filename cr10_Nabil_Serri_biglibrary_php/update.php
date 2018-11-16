<?php

 ob_start();
session_start();

 

require_once 'actions/db_connect.php';

 

if($_GET['Media_id']) {

    $Media_id = $_GET['Media_id'];

 

    $sql = "SELECT * FROM media WHERE Media_id = {$Media_id}";

    $result = $connect->query($sql);

 

    $data = $result->fetch_assoc();

 

    $connect->close();

 

?>

 

<!DOCTYPE html>

<html>

<head>

    <title>Edit User</title>
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
                    
                
                <a class="navbar-brand text-warning" href="#">CodeReview 10</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                                  <a class="nav-link btn btn-outline-warning" href="#" data-toggle="modal" data-target="#exampleModalCenter4"> Add New Book <span class="sr-only">(current)</span></a>
                                  
                </li>
                 -->
                 
                </ul>
                <form class="form-inline my-2 my-md-0">
          
                </form>
            </div>
            </div>
            </nav>
        </div>
<div class="container">
  

    <form action="actions/a_update.php" method="post" class="my-2">
              <div class="form-group">
                <label for="exampleInputEmail1">ISBN code:</label>
                <input type="text"
                class="form-control"
                name="ISBN_code"
                placeholder="Enter ISBN code"
                value="<?php echo $data['ISBN_code'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">title:</label>
                <input type="text"
                class="form-control"
                name="title"
                placeholder="Enter title"
                value="<?php echo $data['title'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">image:</label>
                <input type="text"
                class="form-control"
                name="image"
                placeholder="Enter image URL"
                value="<?php echo $data['image'] ?>"
                >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">short description:</label>
                <input type="text"
                class="form-control"
                name="short_description"
                placeholder="Enter short description"
                value="<?php echo $data['short_description'] ?>"
                >
              </div>
              <!-- <div class="form-group">
                <label for="exampleInputEmail1">type:</label>
                <select class="custom-select" name="type">
                <option selected>Choose...</option>
                <option value="book">Book</option>
                <option value="CD">CD</option>
                <option value="DVD">DVD</option>
              </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">status:</label>
                <select class="custom-select" name="status">
                <option selected>Choose...</option>
                <option value="available">available</option>
                <option value="not_available">not available</option>
              </select>
              </div> -->
            
              <button type="hidden" class=" btn btn-warning" name="Media_id" value="<?php echo $data['Media_id']?>">
                Save Changes
              </button>
              <a href="index.php"><button type="button" class=" btn btn-warning">Back</button>
            </form> 

 </div>



 

</body>

</html>

 

<?php

}
ob_end_flush(); 
?>

