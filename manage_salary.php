<?php
session_start();
//if(!isset($_SESSION['login']))
//{
 //   header('location:index.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41129fd756.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manage_salary.css" rel='stylesheet'>
   
    <title>Employee Record</title>
</head>
<body>
<!--sidebar starts here-->
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bando ERP</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="dashboard.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">HRM Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">HRM Panel</a></li>
          <li><a href="#">Employee Records</a></li>
          <li><a href="#">Holiday list</a></li>
          <li><a href="#">Joining Letter</a></li>
          <li><a href="manage_salary.php">Bonus/Deduct Salary</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Finance Panel</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        
      </div>
      <div class="name-job">
        <div class="profile_name">Tonmoy</div>
        <div class="job">Web Desginer</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <!-- sidebar ends here-->

 <!--homesection or main body starts here -->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Bonus/Deduct Salary</span>
      
    </div>
    <div class = "sec-1">
     <div class ="card">
     <table class="styled-table">
    <?php
           include 'connect.php';
           mysqli_select_db($connect,'erp');
           $limit = 10;
           
           if(isset($_GET['page']))
           {
            $page = $_GET['page'];
           }
           else
           {
            $page =1;
           }
           $offset = ($page-1) * $limit;
           $query1 = "select * from employee";
           $result = mysqli_query($connect,$query1);
           ?>
      <thead>
        <tr>
          <th class="head" colspan="7">
<?php echo'<span>Total Entries found '.mysqli_num_rows($result).' & Showing Page Number '.$page.'</span>';?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr>
          <form action="emp_search.php" method="POST">
          <th colspan="2" class="head1">
           <input id="form_lastname" type="number"  name="search" class="form-control" placeholder="Enter employee id *"  required="required" >
          </th>
          <th colspan="3"class="head1">
          <button class="btn btn-light" type="submit" name ="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </th>
          </form>
          
          <th class="head1">
            <button class="btn btn-success" onclick="window.location.href='t.php'" name ="submit"><i class="fas fa-history"></i>&nbsp;History</button>
            <button class="btn btn-success" onclick="myFunction()" name ="submit"><i class="fas fa-hand-holding-usd"></i>&nbsp;Festival Bonus(All)</button>
            <button class="btn btn-light"  id="mybtn" ><i class="fas fa-angle-double-up"></i>&nbsp;Add Bonus</button>
            <button type="submit"class="btn btn-light" id="mybtn2"><i class="fas fa-angle-double-down"></i>&nbsp;Deduct</button>
          </th>
          <th colspan="1"class="head1">
          <button class="btn btn-danger" onclick="myFunction2()" name ="submit"><i class="fas fa-broom"></i>&nbsp;Clear Festive Bonus</button>

          </th>
          
        </tr>           
      </thead>
    <thead>
        <tr>
            
            <th>Employee ID&nbsp;</th>
            <th>Employee Name&nbsp;&nbsp;</th>
            <th>Designation&nbsp;&nbsp;</th>
            <th>Salary&nbsp;&nbsp;</th>
            <th>Total Bonus Amount&nbsp;&nbsp;</th>
            <th>Total Deducted Amount&nbsp;&nbsp;</th>
            <th>Festival Bonus</th>
           
        </tr>
    </thead>
    <tbody>
          <!-- php code for generating the employee list in the table-->
          <?php
          mysqli_select_db($connect,'erp');
           $query  = "select *from employee natural join salary ORDER BY emp_id desc LIMIT {$offset},{$limit}";
           $run = mysqli_query($connect,$query);
           while($fetch = mysqli_fetch_array($run))
           {
           ?>
        <tr>
            
            <td><?php echo $fetch['emp_id']?></td>
            <td><?php echo $fetch['name']?></td>
            <td><?php echo $fetch['designation']?></td>
            <td><?php echo $fetch['salary']?> &#2547;</td>
            <td><?php echo $fetch['bonus']?> &#2547;</td>
            <td><?php echo $fetch['deduction']?> &#2547;</td>
            <td><?php echo $fetch['festival_bonus']?> &#2547;</td>
               
        </tr><?php
           }
           ?> 
    </tbody>
        
</table>
<?php
$query1 = "select * from employee";
$result = mysqli_query($connect,$query1);
if(mysqli_num_rows($result)> 0)
{
  $records =mysqli_num_rows($result); 
  $total_page = ceil($records / $limit);
  echo '<ul class ="pagination">';
  if($page >1)
  {
    echo'<li><a href="emp_record.php?page='.($page-1).'" class="btn btn-primary">Prev</a></li>';
  }
  for($i =1;$i<=$total_page;$i++)
  {
    
    echo'<li><a href="emp_record.php?page='.$i.'" class="btn btn-primary">'.$i.'</a></li>';
  
  }
  if($total_page > $page)
  {
    echo'<li><a href="emp_record.php?page='.($page+1).'" class="btn btn-primary">Next</a></li>';
  }
  echo'</ul>';

}
?>
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close"><button type="button" class="btn btn-danger" id="close"><i class="fas fa-times"></i></button></span>
    <h2>Add Bonus</h2>
  </div>
  <div class="modal-body">
  
  <div class="row ">
  <form action="backend/bonus.php" method="post">
          <div class="col-lg-7 mx-auto">
             <div class="row">

           <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_id">Employee ID <span style="color:#ff0000">*</span></label>
                                <input id="form_id" type="number"  name="id" class="form-control" placeholder="Please enter unique employee ID *" value="" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need1">Bonus Amount <span style="color:#ff0000">*</span></label>
                                <select id="form_need1"  name="bonus" class="form-control" required="required">
                                    <option value="" selected disabled>--Select Amount--</option>
                                    <option value="20">Festival Bonus --> 20% </option>
                                    <option value="5">Performance Bonus --> 5% </option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_id">Remarks</label>
                                <textarea id="form_id" name="reason" class="form-control" placeholder="Please type the reason for the bonus" required></textarea>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                        
                            <button name ="submit" type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                "  >Submit</button>
                       </div>
                    </div>
             </div>
          </div>
  </div>
  </div>
  
</div>

</div>
</form>

     </div>
     </div>
<footer>
<div class="bg-light py-4">
      <div class="container text-center">        <!--this is the footer -->
        <?php $date = date("Y");
        $year =date('Y',strtotime($date));?>
        <p class="text-muted mb-0 py-2">© <?php echo $year ?> Bando Eco Apparels Ltd All Rights Reserved.</p>
      </div>
    </div>
</footer>
  </section> <!--homesection ends here-->

  
  <!-- javascript codes are here -->
  <script>
                  function myFunction() {
                    var txt;
                  if (confirm("NB: All employees will be enjoying 20% Festival bonus.                         Press Ok to proceed")) {
                  window.location.replace("http://www.w3schools.com");
                     } else {
                        txt = "You pressed Cancel!";
                      }
                        
                       }
             </script>

<script>
                  function myFunction2() {
                    var txt;
                  if (confirm("NB: All employees who are enjoying 20% Festival bonus will be cleared. Press Ok to proceed")) {
                  window.location.replace("backend/clearbonus.php");
                     } else {
                        txt = "You pressed Cancel!";
                      }
                        
                       }
             </script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?> <!-- notification javascript code -->
        <script>
            swal({
  title: "<?php echo $_SESSION['status'];?>",             
  text: "",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status']);
?>   

<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("mybtn");
var close = document.getElementById("close");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

close.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

<!--navbar javascript code-->
  <script>
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;   
                                                            
 arrowParent.classList.toggle("showMenu");
  });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});
</script>
</body>

</html>