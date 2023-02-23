<?php

$insert = false;
$update = false;
$delete = false;
//connect to the database
$server = "localhost";
$user = "root";
$pass = "";
$db = "notes";

//create a connection
$conn = mysqli_connect($server, $user, $pass, $db);

//die if the connection was not successful
if (!$conn) {
  die("Connection failed. Error ==> " . mysqli_connect_error());
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;

    $sql = "DELETE FROM `inotes` WHERE `sno` = '$sno'";
    $result = mysqli_query($conn,$sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['snoEdit'])) {
    // echo "yes";

    // update the record 
    $sno = $_POST['snoEdit'];
    $title = $_POST['titleEdit'];
    $description = $_POST['descEdit'];

    $sql = "UPDATE `inotes` SET `title` = '$title' , `description` = '$description' WHERE `inotes`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $update = true;
    } else {
      echo "Record failed to Updated Successfully";
    }
    // exit();
  } else {
    $title = $_POST['title'];
    $description = $_POST['desc'];

    $sql = "INSERT INTO `inotes` (`title`, `description`) VALUES ('$title', '$description')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      // echo "Data inserted successfully";
      $insert = true;
    } else {
      echo "Failed to insert data" . mysqli_errno($conn);
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- datatables css  -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <!-- jquery cdn  -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>




  <title>iNotes - Notes taking made easy</title>
</head>

<body>
  <!-- edit modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Launch demo modal
</button> -->

  <!-- edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <h2>Add a note</h2>
            <div class="mb-3 ">
              <label for="titel" class="form-label">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">

            </div>

            <div class="my-3">
              <label for="desc" class="form-label">Note Description</label>
              <textarea class="form-control" placeholder="Add description about your note" id="descEdit" name="descEdit" style="height: 100px"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">iNotes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          </li>
        <!-- </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been inserted successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }

  ?>
  <?php
  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been updated successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }

  ?>
  <?php
  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been deleted successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }

  ?>


  <div class="container my-4 d-flex justify-content-center">
    <form action="index.php" method="POST" class="d-flex justify-content-center flex-column" style="width:50%">
      <h2>Add a note</h2>
      <div class="mb-3 ">
        <label for="titel" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="titel" name="title" aria-describedby="emailHelp">

      </div>

      <div class="my-3">
        <label for="desc" class="form-label">Note Description</label>
        <textarea class="form-control" placeholder="Add description about your note" id="desc" name="desc" style="height: 100px"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Notes</button>
    </form>
  </div>

  <div class="container  my-4">


    <table id="myTable" class="table">
      <thead class="table-light">
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `inotes`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno += 1;
          echo "<tr class='table-danger'>
              <th scope='row'>" . $sno . "</th>
                  <td> " . $row['title'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td><button class='btn btn-sm btn-primary edit' id=" . $row['sno'] . ">Edit</button> <button class='btn btn-sm btn-primary delete' id=d" . $row['sno'] . ">Delete</button></td>
                  
              </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ", );
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;;
        console.log(title, description);
        titleEdit.value = title;
        descEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ", );
        sno = e.target.id.substr(1, );
        if (confirm("Are you sure about deleting this note?")) {
          console.log("yes");
          window.location = `index.php?delete=${sno}`;
        } else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>