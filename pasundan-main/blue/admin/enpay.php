<?php

session_start();

include('../connect.php');

if(!isset($_SESSION['username'])){
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- font [sans serif display] -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <!-- bootstrap csss -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icon  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- font [poppins] -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Payment</title>
    <style>
      .col .bg-light{
            max-width: 1000px; 
            padding: 30px 30px 30px 30px;
            background-color: #f2f2f2;
            border-radius: 90px;
            box-shadow: 
                3px 3px 3px 3px rgba(0, 0, 0, 0.08), 
                -3px -3px 3px #fff;
            margin-left: 40px;
        }
        .card {
            max-width: 1000px;
            padding: 30px 30px 30px 30px;
            background-color: #f2f2f2;
            border-radius: 60px;
            box-shadow: 
                0 5px 9px 0 rgba(1, 2, 1, 0.2), 
                0 6px 20px 0 rgba(0, 0, 0, 0.20);
            margin-left: 40px;
        }
        .hover-1{
            color:#0b0b0b;
        }
        .hover-1:hover {
            color: #3A98B9;
        }
    </style>
</head>
<body style="background-color: #E0F1F1;font-family: 'Poppins', sans-serif;">
    <!-- navbar -->
    <nav class="navbar d-flex navbar-dark justify-content-between" style="background-color: #1d1d1d;">
        <a class="navbar-brand fw-bold">
        &emsp;<img src="../totoro.png" alt="" width="30" height="30" class="d-inline-block align-top">
        SPP Payment</a>
    <form class="form-inline d-flex">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">&emsp;
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>&emsp;
    </form>
    </nav>
    <!-- sidebar -->
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0" style="background-color: #0b0b0b;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 mt-3 float-start">
                    <!-- profile -->
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/<?= $_SESSION['img']; ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">&nbsp;
                        <span class="d-none d-sm-inline mx-1" style="font-weight: bold;"><?php echo $_SESSION['username'];?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" style="border-radius: 20px;background-color:#1d1d1d">
                        <li>
                            <a href=""  class="dropdown-item"><ion-icon name="person"></ion-icon>&nbsp;Profile</a>
                        </li>
                        <hr class="dropdown-divider">
                        <li>
                            <a href="../logout.php" onclick="return confirm('affh iyh mau logout?')" class="dropdown-item"><ion-icon name="log-out"></ion-icon>&nbsp;Logout</a>
                        </li>
                    </ul>
                    </div>
                    <!-- end profile -->
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start fw-bold" id="menu">
                        <li class="nav-item">
                            <a href="house.php" class="nav-link align-middle px-0 text-light"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="history.php" class="nav-link align-middle px-0 text-light"><ion-icon name="hourglass"></ion-icon>&nbsp;History</a>
                        </li>
                        <li class="nav-item">
                            <a href="enpay.php" class="nav-link align-middle px-0 text-light"><ion-icon name="logo-paypal"></ion-icon>&nbsp;Entry Payment</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-light"><ion-icon name="file-tray-stacked"></ion-icon>&nbsp; Data &emsp;<ion-icon name="caret-down"></ion-icon></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="spp.php" class="nav-link px-0 text-white"><ion-icon name="documents"></ion-icon>&nbsp;SPP</a>
                                </li>
                                <li class="w-100">
                                    <a href="student.php" class="nav-link px-0 text-white"><ion-icon name="people"></ion-icon>&nbsp;Student</a>
                                </li>
                                <li class="w-100">
                                    <a href="staff.php" class="nav-link px-0 text-white"><ion-icon name="people"></ion-icon>&nbsp;Staff</a>
                                </li>
                                <li class="w-100">
                                    <a href="cls.php" class="nav-link px-0 text-white"><ion-icon name="book"></ion-icon>&nbsp;Class</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
    <!-- end sidebar -->
    <!-- content -->
    <div class="col py-3 konten d-flex flex-column">
    <!-- form -->
    <div class="container">
      <div class="row">
         <div class="col bg-light mt-4">
            <div class="container mt-4">
            <form action="cre-enpay.php" method="post">
            <div class="row">
                <div class="col">
                    <h4 class="fw-bold">Entry Payment</h4>
                </div>
                <div class="col text-end">
                    <span class="fw-bold">Date : </span>&nbsp;<input type="text" name="paydate" value="<?php echo date('d/m/y')?>" style="width:100px;float:right" class="form-control rounded-3" readonly>
                </div>
            </div>
                <!-- <div class="">
                    
                </div> -->
                <hr class="divider">
                <div class="mb-3 mt-2">
                <label for="form-label" class="fw-bold mb-1">NISN</label>
                        <select name="nisn" class="form-select required">
                            <?php $query = $maru->query('SELECT * FROM student')->fetchAll();
                            foreach ($query as $query) :?>
                            <option selected></option>
                                <option value="<?php echo $query['nisn']?>"><?php echo $query['nisn']?></option>
                            <?php endforeach ?>
                        </select>
                </div>
                <div class="row">
                    <div class="col mt-2 mb-3">
                        <label for="form-label" class="fw-bold mb-1">Id SPP</label>
                        <select name="idspp" class="form-select" required>
                            <?php $query = $maru->query('SELECT * FROM spp')->fetchAll();
                            foreach ($query as $query) :?>
                            <option selected></option>
                                <option value="<?php echo $query['idspp']?>"><?php echo $query['idspp']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col mt-2 mb-3">
                        <label for="form-label" class="fw-bold mb-1">Id Staff</label>
                        <select name="idstaff" class="form-select" required>
                            <?php $query = $maru->query('SELECT * FROM staff')->fetchAll();
                            foreach ($query as $query) :?>
                                <option selected></option>
                                <option value="<?php echo $query['idstaff']?>"><?php echo $query['idstaff']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col input-group mb-3 mt-3">									
                    <label class="input-group-text">										 	
                            SPP Pay Month	
                    </label>
                    <select class="form-select" name="paymonth">
                        <?php
                            $o = array ("", "January", "February", "March", "April", "May" ,"June", "July", "August", "September", "October", "November", "December"); 
                            for ($z=1;$z<=12;$z++){
                                echo "<option selected> </option>";
                                echo "<option value=".$z.">".$o[$z]."</option>";
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col input-group mb-3 mt-3">
                        <label class="input-group-text">Year</label>
                        <select name="payyear" class="form-select" size="1">
                            <?php
                                for ($i=1999;$i<=2025;$i++){
                                    echo "<option selected> </option>";
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="form-label" class="fw-bold mb-1">Pay Total</label>
                    <input type="name" name="payamount" class="form-control rounded-3" placeholder="Rp 00000000" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="mb-3 btn btn fw-bold" style="float:right;border-radius:15px;background-color:#95CD41">Submit</button>
                </div>
            </form>
            </div>
         </div>
      </div>
    </div>
    <!-- end form  -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                <div class="card-body">
                <div class="card-tittle"><h4 class="fw-bold">Payment Data</h4></div>
                <table class="table table-borderless table-hover table-responsive-sm mt-4 text-center" style="border-radius: 20px;background:#fff;box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.08), 
                -3px -3px 3px #fff;;">
                <thead>
                    <tr style="font-family: 'DM Serif Display', serif;" class="fw-bold">
                        <th scope="col">No</th>
                        <th scope="col">Staff</th>
                        <th scope="col">Nisn Student</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Pay Total</th>
                        <th scope="col">Pay Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
                    $query = $maru->query('SELECT staff.namest, payment.idpay, payment.nisn, student.name, payment.payamount, payment.paydate FROM ((payment INNER JOIN staff ON payment.idstaff = staff.idstaff) INNER JOIN student ON payment.nisn = student.nisn);')->fetchAll();
                    $no=1;
                    
                    foreach ($query as $query):?>
                <tbody>
                    <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><a href="staff.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['namest']?></a></td>
                        <td><a href="student.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['nisn']?></a></td>
                        <td><a href="student.php" class="hover-1 fw-bold" style="text-decoration: none;"><?=$query['name']?></a></td>
                        <td><?=$query['payamount']?></td>
                        <td><?=$query['paydate']?></td>
                        <td>
                            <a href="upd-spp.php?idpay=<?=$query['idpay'];?>" class="btn btn-sm text-white mb-3" style="background-color: #557153;border-radius:10px"><ion-icon name="create" style="font-size: 20px;"></ion-icon></a>
                            <a href="del-spp.php?idpay=<?=$query['idpay'];?>" class="btn btn-danger mb-3 btn-sm text-white" style="border-radius:10px"><ion-icon name="trash-bin" class="text-center" style="font-size: 20px;"></ion-icon></a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach ?>
                </table>
                </div>
                </div>
                </div>
             </div>  
        </div>
    </div>
    <!-- end content  -->
    </div>
</div>
    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</body>
</html>