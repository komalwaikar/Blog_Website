<?php include 'header.php';?>

  <!-- Page Wrapper -->
  

   



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 style="color:black" class="font-weight-bold">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          
    <div class="row">
    
    
    

    
    <?php
    
    $read_blog="SELECT * from create_blog";
    $result_read_blog=mysqli_query($connection,$read_blog);
    while($row=mysqli_fetch_array($result_read_blog))
    {
      ?>
      <div class="col-lg-6">

      <div class="card" style="width: 30rem;">
      <h1 style="color:black"><?php echo $row['blog_tittle'];?></h1>
      <img src="images/<?php echo $row['blog_img'];?>" height="250px" weidth="200px" class="card-img-top" alt="...">
      <div class="card-body">
        <p><?php echo $row['blog_discription']?></p>
        
       </div> 
       </div>
       <br>
       </div>
      
      <?php }
    
    ?><br>





    
   
    
    </div>
         
         
    






  </div>
        <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      


<?php include 'footer.php';?>  