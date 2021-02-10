<?php include 'header.php';?>

  <!-- Page Wrapper -->
  

   



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          

          <h1 style="color:black" class="font-weight-bold" >
          Blog Categories
          </h1>
         
        <table class="table table-bordered table-hover">

        <thead style="color:black" class="font-weight-bold">
        <tr>
           <th>Sr.no</th>
           <th>Category_name</th>
           <th>Action</th>
        
        </tr>
        </thead>


        


        <tbody style="color:black" >
        
        <?php 
        $read_cate="SELECT * from category";
        $result_read_cate = mysqli_query($connection,$read_cate);

        if($result_read_cate)
        {
            $i=1;
           while($row= mysqli_fetch_array($result_read_cate))
           {
               ?>
             <tr>
             <td> <?php echo $i;?></td>
             <td> <?php echo $row['category_name'];?></td>
<td>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
  update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
      <lable>Catagory name:</lable>
      <input type="hidden" value="<?php echo $row['id'];?>" name="u_id">
      <input type="text" value="<?php echo $row['category_name'];?>" class="form-control" name="u_cate">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_btn" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<?php 
 
 if(isset($_POST['update_btn']))
{
  $udid=$_POST['u_id'];
  $u_catename=$_POST['u_cate'];

  $update_cate="UPDATE category set category_name='$u_catename' where id='$udid'";
  $result_update_cate=mysqli_query($connection,$update_cate);

  if($result_update_cate)
  {
    header("location:create_cate.php");
  }
  else{
    echo "error".mysqli_error($connection);
  }
}
?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $i;?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        Are you sure wants to Delete <?php echo $row['category_name'];?> ?
        <input type="hidden" value="<?php echo $row['id']?>" name="u_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="delete" class="btn btn-primary">Delete Category</button>
      </div>
      </form>
    </div>
  </div>
</div>




</td>
             </tr>  <?php
             $i++;
           }
        }

        
        else{
            echo "Error".mysqli_error($connnection);
        }
        ?>
        </tbody>
        <!-- <tfooter>
        <tr>
        
           <th>Sr.no</th>
           <th>Category_name</th>
           <th>Action</th>
        </tr>
        </tfooter> -->
        </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <?php 

if(isset($_POST['delete']))
{
  $uid=$_POST['u_id'];
  $delete_cate="DELETE from category where id='$uid'";
  $result_delete_query=mysqli_query($connection,$delete_cate);
  
  if($result_delete_query)
  {
    header("location:create_cate.php");
  }
  else{
    echo "Error".mysqli_error($connection);
  }
}

?>

  <?php include 'footer.php';?>  