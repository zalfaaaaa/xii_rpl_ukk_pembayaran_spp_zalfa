<?php

session_start();

include('../connect.php');
$query = $maru->query('SELECT * FROM class')->fetchAll();

if(!isset($_SESSION['username'])){
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
    <style>
      /* The side navigation menu */
      .sidenav {
        height: 100%; /* 100% Full-height */
        width: 0; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #f5f5f5; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
      }

      /* The navigation menu links */
      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
        color: #1d1d1d;
        display: block;
        transition: 0.3s;
      }

      /* When you mouse over the navigation links, change their color */
      .sidenav a:hover {
        color: #000080;
      }
      /* Position and style the close button (top right corner) */
      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 5px;
        font-size: 36px;
        margin-left: 95px;
      }
      /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
      #main {
        transition: margin-left .5s;
        padding: 20px;
      }
      #en {
        transition: margin-left .5s;
        padding: 5px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }
      .to{
        font-size: 50px;
        color: white;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-size: 20px;
        font-weight: bold;
        background-color: #f5f5f5;
      }
      li {
        float: left;
      }
      .img{
        margin-top: 6px;
        margin-left: 16px;
        margin-bottom: 2px;
      }
      .profile{
        font-size: 20px;
        font-weight: bold;
      }
      .hyv{
        border-radius: 50%;
      }
      body{
        font-family: 'Poppins', sans-serif;
        background-image: linear-gradient(to right, #DECBA4, #849FBD);
      }
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 180px;
        border-radius: 20px;
        box-shadow: 
          3px 3px 3px 3px rgba(0, 0, 0, 0.08),
          -3px -3px 3px #fff;
        padding: 12px 16px;
        z-index: 1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .txt{
        float: right;
        color: #ba0000;
        text-decoration: none;
        margin-top: 4px;
        margin-bottom: 4px;
        font-size: 30px;
        margin-right: 20px;
      }
      .card{
        background-color: #f2f2f2;
        border-radius: 35px;
        box-shadow: 
          0 5px 9px 0 rgba(0, 0, 0, 0.2), 
          0 6px 20px 0 transparent;
      }
    </style>
</head>
<body>
  <!-- sidebar -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="profile">
      <center><img src="img/<?= $_SESSION['img']; ?>" class="hyv" width="100" alt=""></center>
      <p><center><?php echo $_SESSION['username'];?></center></p>
    </div>
    <a href="home.php"><ion-icon name="home"></ion-icon>&emsp;Home</a>
    <a href="history.php"><ion-icon name="hourglass"></ion-icon>&emsp;History</a>
    <a href="payment.php"><ion-icon name="wallet"></ion-icon>&emsp;Payment</a>
    <div class="dropdown">
      <a href="#"><ion-icon name="documents"></ion-icon>&emsp;Data</a>
      <div class="dropdown-content">
        <a href="student.php"><ion-icon name="people"></ion-icon>&emsp;Student</a>
        <a href="staff.php"><ion-icon name="id-card"></ion-icon>&emsp;Staff</a>
        <a href="spp.php"><ion-icon name="reader"></ion-icon>&emsp;SPP</a>
        <a href="class.php"><ion-icon name="book"></ion-icon>&emsp;Class</a>
      </div>
    </div>
    <a href="report.php"><ion-icon name="receipt"></ion-icon>&emsp;Report</a>
  </div> 
  <!-- end sidebar -->
  <!-- navbar -->
  <ul id="en">
    <img src="../totoro.png" class="img" width="35" height="35"> SPP Payment
    <a href="../logout.php" onclick="return confirm('Are You Sure?')" class="txt"><ion-icon name="log-out"></ion-icon></a>
  </ul>
  <!-- end navbar -->
  <span onclick="openNav()" class="to" ><ion-icon name="caret-forward"></ion-icon></span>
  <!-- content -->
  <div id="main">
  <div class="container-fluid">
    <div class="container table-responsive">
      <div class="d-grip gap-2 col-12">
    <div class="row">
    <div class="col">
        <div class="container">
            <h1 class="d-flex"><ion-icon name="book"></ion-icon>&nbsp;Class Data</h1>
            <table class="table table-borderless table-hover table-responsive-sm mt-2 text-center" style="border-radius: 20px;background:#fff;box-shadow: 0 5px 9px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Majority</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
                    $no=1;
                    foreach ($query as $query):?>
                <tbody>
                    <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><?=$query['clsname']?></td>
                        <td><?=$query['skillcom']?> - <?=$query['skillsort']?></td>
                        <td>
                        <a href="upd-class.php?idcls=<?=$query['idcls'];?>" class="btn btn-sm text-white mb-3" style="background-color: #557153;border-radius:10px"><ion-icon name="create" style="font-size: 20px;"></ion-icon></a>
                    <a href="del-class.php?idcls=<?=$query['idcls'];?>" class="btn btn-danger mb-3 btn-sm text-white" style="border-radius:10px"><ion-icon name="trash-bin" class="text-center" style="font-size: 20px;"></ion-icon></a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
      <div class="card" style="width: 20rem;">
      <div class="card-body">
      <form action="cre-class.php" method="post">
                <div class="d-flex">
                    <ion-icon name="ribbon" style="font-size: 20px;"></ion-icon>&nbsp;
                    <h5 class="fw-bold">Add New Class</h5>
                </div>
                <hr class="divider">
                <div class="mb-3 mt-3">
                    <label for="form-label" class="fw-bold mb-1">Class</label>
                    <input type="text" name="clsname" class="form-control rounded-3" placeholder="XXX" required>
                </div>
                <div class="mb-3">
                    <label for="form-label" class="fw-bold mb-1">Majority</label>
                    <input type="text" name="skillcom" class="form-control rounded-3" placeholder="your skill" required>
                </div>
                <div class="mb-3">
                    <label for="form-label" class="fw-bold mb-1">Sort</label>
                    <input type="text" name="skillsort" class="form-control rounded-3" placeholder="your skill" required>
                </div>
                <div class="mb-2 d-flex" style="float: right;">
                    <a href="class.php" class="btn btn text-center text-light fw-bold shadow" style="background-color:#ba0000;border-radius:12px">Cancel</a>&emsp;
                    <button type="submit" class="btn btn text-center fw-bold shadow" style="background-color:#95CD41;border-radius:12px">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
<script>
    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
  function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("en").style.marginLeft = "200px";
  }
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("en").style.marginLeft = "0";
  }
</script>
</body>
</html>