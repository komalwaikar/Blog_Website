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
          View Blog
          </h1>
         
   
   <?php
         $read_category="SELECT * from category";
         $result_read_category=mysqli_query($connection,$read_category);
         if($result_read_category)
         {
           
           while($row=mysqli_fetch_array($result_read_category))
           {
             ?>
             <input type="hidden" name="cate_name" value="<?php echo $row['id'];?>"> </>
             <?php
           }
         }
         ?>
<table class="table table-bordered table-hover">
    <thead style="color:black" class="font-weight-bold">
    <tr>
        <th>Sr.no</th>
        <th>Blog tittle</th>
        <th>Image</th>
        
        <th>Created on</th>
        <th>Blog Discription</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
       $veiw_user="SELECT * from create_blog";
       $result_view_user=mysqli_query($connection,$veiw_user);

       if($result_view_user)
       {
           $i=1;

           while($row=mysqli_fetch_array($result_view_user))
           {
               if($_SESSION["id"]== $row['user_id'])
               {
                 ?>
                 <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $row['blog_tittle'];?></td>
             <?php $image_name=$row['blog_img']; ?>
                 <td><img src="images/<?php echo $image_name;?>" height="100px" weidth="100px" alt=""></td>
                 
                 <td><?php echo $row['blog_date'];?></td>
                 <td><?php echo $row['blog_discription'];?></td>
                 <td>
                 

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>">
  update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
      <lable>Blog tittle</lable>
      <input type="hidden" value="<?php echo $row['id'];?>" name="u_id">
      <input type="text" value="<?php echo $row['blog_tittle'];?>" class="form-control" name="bl_name">
      <lable>Blog discription</lable>
      
      <input type="text" value="<?php echo $row['blog_discription'];?>" class="form-control" name="bl_disco">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_blog" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



<?php 
 
 if(isset($_POST['update_blog']))
{
  $udid=$_POST['u_id'];
  $bl_tittle=$_POST['bl_name'];
  $bl_dicription=$_POST['bl_disco'];

  $update_cate="UPDATE create_blog set blog_tittle='$bl_tittle', blog_discription='$bl_dicription' where id='$udid'";
  $result_update_cate=mysqli_query($connection,$update_cate);

  if($result_update_cate)
  {
    header("location:view_blog.php");
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        Are you sure wants to Delete <?php echo $row['blog_tittle'];?> ?
        <input type="text" value="<?php echo $row['id']?>" name="u_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="deleteblog" class="btn btn-primary">Delete blog</button>
      </div>
      </form>
    </div>
  </div>
</div>



                 
                 </td>
                 

                 </tr>

                 

                 <?php 
                 $i++;
               }
               
           }
       }
    ?>
      <tr>
        
      </tr>
<?php
      if(isset($_POST['deleteblog']))
{
  $id=$_POST['u_id'];
  $delete_blog="DELETE from create_blog where id='$id'";
  $result_delete_blog=mysqli_query($connection,$delete_blog);
  
  if($result_delete_blog)
  {
    header("location:view_blog.php");
  }
  else{
    echo "Error".mysqli_error($connection);
  }
}

?>


    </tbody>
</table>






  </div>
        <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      


<?php include 'footer.php';?>  