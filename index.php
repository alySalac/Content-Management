<!DOCTYPE html>
<html> 
    <?php 
    include 'dbcon.php';
    ?>
    <?php
    $uploadDir = 'uploads/';
    $images = glob($uploadDir . '*.{jpg,jpeg,png,gif,JPG}', GLOB_BRACE);
    ?>
    <head>
        <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<section>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php 
    if (!empty($images)) {
        $active = 'active';
        foreach ($images as $image) {
            echo '<div class="carousel-item ' . $active . '">
                    <img class="d-block w-100" src="' . $image . '" alt="Image">
                  </div>';
            $active = '';
        }
    } else {
        echo '<div class="alert alert-info">No images found.</div>';
    }
    ?>


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<section>
<div class="card" style="width: 18rem;">
<?php 
$sql = "SELECT * FROM tb_cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<img src="'.$row['images_path'].'" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">'.$row['text'].'</p></div>
      </div>;
  '

?>
  
    <?php 
       
  }
} else {
  echo "0 results";
}
?>
    
  
</section>

<section>
    <div>
        <form action="cards.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="photo" id="fileToUpload">
            <input type="text" name = "text" placeholder="enter text">
            <input type="submit" value="submit" name="submit">
            
        </form>
    </div>
</section>

</body>
</html>