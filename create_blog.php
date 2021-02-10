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
         <div class="col-xl-12 col-md-12 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
          <h1 style="color:black" >Create Blog</h1>
         <lable>Select Category <span style="color:red">*</span></lable>
         <select required name="cat_id" id="" class="form-control">
         <?php
         $read_category="SELECT * from category";
         $result_read_category=mysqli_query($connection,$read_category);
         if($result_read_category)
         {
           $i=1;
           while($row=mysqli_fetch_array($result_read_category))
           {
             ?>
             <option value="<?php echo $row['id'];?>"><?php echo $row['category_name'];?> </option>
             <?php
           }
         }
         ?>
         </select><br>

         <lable>Blog Tittle<span style="color:red">*</span></lable>
         <input required type="text" placeholder="Enter Blog Tittle" name="b_name" class="form-control">

         <br>
         <lable>Blog Date<span style="color:red">*</span></lable>
         <input required type="date" placeholder="Enter Blog date" name="b_date" class="form-control">

         <br>
         <lable>Blog Image<span style="color:red">*</span></lable>
         <input required type="file" name="image" class="form-control">

         <br>
         <lable>Blog Discription<span style="color:red">*</span></lable>
         <textarea required type="" name="b_discription" class="form-control" cols="30" rows="4"></textarea>
         <br>
        <button required class="btn btn-success" type="submit" name="blogsubmit">
        Create Blog
        </button>
          </div>

          </form>

         </div>
         </div>
         </div>
    
  </div>
</div>


<?php
if(isset($_POST['blogsubmit']))
{
  $cate_id=$_POST['cat_id'];
  $blog_tittle=$_POST['b_name'];
  $blog_date=$_POST['b_date'];
  // $blog_img=$_POST['image'];
  $blog_discription=$_POST['b_discription'];
  $user_id = $_SESSION["id"];


  if(isset($_FILES['image']))
  {
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   
   
   if($file_size > 2097152){
      $errors[]='File size must be excately 2 MB';
   }
   
   if(empty($errors)==true){
      move_uploaded_file($file_tmp,"images/".$file_name);
      echo "Success";
   }else{
      print_r($errors);
   }
}



  $insert_blog="INSERT into create_blog(user_id,cate_id,blog_discription,blog_date,blog_tittle,blog_img) VALUES('$user_id','$cate_id','$blog_discription','$blog_date','$blog_tittle','$file_name')" ;
  
  $result_insert_blog = mysqli_query($connection,$insert_blog);
                    if($result_insert_blog)
                    {
                        echo "
                        Blog Inserted Successfully
                        ";
                    }
                    else
                    {
                        echo "Error :".mysqli_error($connection);
                    }
}
?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      

  <?php include 'footer.php';?>  