<?php
  require_once("../model/Database.php");
  
  /** <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> */
  $name = $name_error = "";
  $contact = $contact_error = "";
  $address = $address_error = "";

  $db = new Database();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['submit_btn']) {

      if(empty($_POST["name_text"])) {
        $name_error = "Please enter your name.";
      } else {
        $name = test_input($_POST["name_text"]);
      } if(empty($_POST["contact_text"])) {
        $contact_error = "Please enter your contact number.";
      } else {
        $contact = test_input($_POST["contact_text"]);
      } if(empty($_POST["address_text"])) {
        $address_error = "Please enter your address.";
      } else {
        $address = test_input($_POST["address_text"]);
      }
    }

    if($db->create($name, $contact, $address) == true) {
      showPopup("Data is inserted successfully");
    }
  }



  function print_show($name, $contact, $address) {
    print("Name: " .$name);
    echo "Contact: " .$contact;
    echo "Address: " .$address;
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  } 

  function showPopup($message) {
    echo "
      <script type='text/javascript'>
        alert('$message');
      </script>
    ";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP::PDO test</title>

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- my css styles -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

   <!-- navbar  -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="http://localhost/php-pdo-test/index.php">PHP::PDO Mysql Database Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/php-pdo-test/ui/create.php">Create <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/php-pdo-test/ui/read.html">Read</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/php-pdo-test/ui/update.html">Update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/php-pdo-test/ui/delete.html">Delete</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form mt-5">

      <h3 class="font-weight-bold" style="color: gray;">Enter data in database: </h3>
        <div class="input-group mb-3">
            <input type="text" name="name_text" class="form-control" placeholder="Please enter full name" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo htmlspecialchars($name_error); ?>">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="contact_text" class="form-control" placeholder="Enter your contacts" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo htmlspecialchars($contact_error); ?>">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="address_text" class="form-control" placeholder="Enter your full address" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo htmlspecialchars($address_error); ?>">
        </div>

        <input type="submit" name="submit_btn" class="btn btn-primary btn-block" value="SUBMIT">
    </form>

  </div>

</body>
</html>