<?php 

include('../database/connect.php');
?>


    <!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/6e5c8405e6.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="../admin_dashboard/home.css"></link>

       <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> 
        
        <!-- JS for jQuery -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
</head>
<body >
    
        <?php
            include "../admin_dashboard/header.php";
            include "../admin_dashboard/sidebar.php";
           
           
           
        ?>

        <!-- Modal -->
      <form method="POST" action="add_rooms.php" enctype="multipart/form-data">
      <div class="modal fade" id="ADD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD ROOM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                  <label for="">Name</label>
                                  <input type="text" name="title" class="form-control" >
                                </div>
                                <div class="col-md-6">
                                  <label for="">Category</label>
                                  <select name="Category" id="Category" class="form-control">
                                      <option value=""></option>
                                      <option value="Regular">Regular</option>
                                      <option value="Double">Double</option>
                                      <option value="Family">Family</option>
                                      <option value="Standard">Standard</option>
                                      <option value="Deluxe">Deluxe</option>
                                  </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                  <label for="">Price</label>
                                  <input type="number" name="Price" class="form-control">
                                </div>
                                <div class="col-md-6">
                                  <label for="">Capacity</label>
                                  <input type="text" name="Capacity" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                  <label for="">Discount</label>
                                  <input type="number" name="Discount" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                  <label for="">Description</label>
                                  <input type="text" name="Description" class="form-control" >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                  <label for="">Amenities</label>
                                  <input type="text" name="Amenities" class="form-control" >
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-12">
                                  <label for="">image</label>
                                  <input type="file" name="userfile[]" multiple="" id="userfile" class="form-control" value="" >
                                </div>
                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                <input type="submit" name="save" value="Add Room" class="btn btn-info">

                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                            </div>
     

                        <!-- ---- -->

      <!-- <div class="container mt-4">
        <div class="row">
            


            <div class="col-md-12">
            <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="title" class="form-control" >
                            <label for="">Category</label>
                              <select name="Category" id="Category" class="form-control">
                                  <option value=""></option>
                                  <option value="Regular">Regular</option>
                                  <option value="Double">Double</option>
                                  <option value="Family">Family</option>
                                  <option value="Standard">Standard</option>
                                  <option value="Deluxe">Deluxe</option>
                              </select>
                            
                            <label for="">Description</label>
                            <input type="text" name="Description" class="form-control" >
                            <label for="">Price</label>
                            <input type="number" name="Price" class="form-control">
                            <label for="">Capacity</label>
                            <input type="text" name="Capacity" class="form-control">
                            
                           
                            <label for="">image</label>
                            <input type="file" name="userfile[]" multiple="" id="userfile" class="form-control" value="" >
                            <input type="submit" name="save" class="btn btn-secondary" value="Add Room">
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
      </div>


      
    </div>
  </div>
</div>

</form>


<!-- <section class="dataTable_room"> -->

<div class="row ml-5">
    <div class="col-md-1 ">
        
    </div>

  <div class="col-md-11  ">
    
  <div class="d-flex justify-content: center; align-items: center " style="flex-direction: column;">
    <h3 class="ml-5 mt-1">Room List</h3>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary ml-5 mb-3" data-toggle="modal" data-target="#ADD"><i class="fa-solid fa-plus" ></i> Add Room</button>

  
    <table class="table table-responsive" id="" style="margin: 0 auto; width: 90%; ">
        
    <thead>
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Amenities</th>
        <th>Description</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Capacity</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <?php
        $query=mysqli_query($conn,"select * from room");
        while($row=mysqli_fetch_array($query)){
          $id = $row['room_Id'];
        ?>
          
          <tr>
              <td> 
                  <!-- <input type="file" value="<?php echo $row['image_dir'];?>" class="d-none"> -->
                  <img src="<?php echo $row['image_dir'];?>" width="100px" alt="img" >
                  <p class="d-none"><?php echo $row['image_dir'];?></p>
              </td>
              <td class="d-none"><?php echo $row['room_Id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['Category']; ?></td>
              <td><?php echo $row['Amenities']; ?></td>
              <td><?php echo $row['Description']; ?></td>
              <td><?php echo $row['Price']; ?></td>
              <td><?php echo $row['Discount']; ?>%</td>
              <td><?php echo $row['Capacity']; ?></td>
              <td><?php echo $row['Status']; ?></td>
              <td>
              <button type="button" class="btn btn-info editBtn" data-toggle="modal" data-target="#edit<?php echo $row['room_Id'];?>"> EDIT</button>
              <!-- <button type="button" class="btn btn-dark"   data-toggle="modal" data-target="#view"> <i class="fa-solid fa-eye"></i> VIEW</button> -->
              </td>


              <!-- Modal -->
              <div class="modal fade" id="edit<?php echo $row['room_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="room_update.php" method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">

                          <div class="col-md-12">
                              <label for="">Current Photo</label>
                              <div class="d-flex justify-content-center align-items-center">
                                <img src="<?php echo $row['image_dir'];?>" width="100%" height="250" alt="img" class="cur_Image">
                              </div>
                              
                              <!-- <input type="file" value="" name="roomImage" id="roomImage" class="form-control" > -->
                          </div>
                          </div>

                          <div class="row mb-3">

                          <div class="col-md-12">
                              <label for="">New Photo</label>
                              <input type="file" value="<?php echo $row['image_dir'];?>" multiple="" name="userfile[]" id="userfile" class="form-control" >
                          </div>
                          </div>

                            <div class="row">

                                <input type="text" value="<?php echo $row['room_Id'];?>" name="room_Id" id="room_Id " class="form-control d-none " >

                                <div class="col-md-6">
                                    <label for="">Title</label>
                                    <input type="text" value="<?php echo $row['title'];?>" name="title" id="title" class="form-control" >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Category</label>
                                    <input type="text" value="<?php echo $row['Category'];?>" name="category" id="category" class="form-control" >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" value="<?php echo $row['Description'];?>" id="description" cols="0" rows="3" class="form-control">
                                    <?php echo $row['Description'];?>
                                    </textarea>
                                    <!-- <input type="text" value="" name="address" id="print_address" class="form-control" > -->
                                </div>

                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Amenities</label>
                                    <textarea name="amenities" value="<?php echo $row['Amenities'];?>" id="amenities" cols="0" rows="3" class="form-control">
                                    <?php echo $row['Amenities'];?>
                                    </textarea>
                                    <!-- <input type="text" value="" name="address" id="print_address" class="form-control" > -->
                                </div>

                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Discount</label>
                                    <input type="number" value="<?php echo $row['Discount'];?>" name="discount" id="discount" class="form-control" >
                                </div>
                            </div>

                            

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="discount" value="<?php echo $row['Price'];?>" name="price" id="price" class="form-control" >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Capacity</label>
                                    <input type="number" value="<?php echo $row['Capacity'];?>" name="capacity" id="capacity" class="form-control" >
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="">Select Status</label>
                                    <!-- <input type="text" value="" id="status" class="form-control" > -->
                                    <select name="status" id="status" class="form-control" value="<?php echo $row['Status'];?>">
                                        <option value="<?php echo $row['Status'];?>"><?php echo $row['Status'];?></option>
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                <input type="submit" name="updateBtn" value="SAVE" class="btn btn-info">

                                <!-- Dito na tayo sa form ang pag eedit ng status  -->
                            </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>

                <!-- Modal -->
            
            </tr>
          <?php }?>
        </tbody>

       

        
               
</table>

  </div>
</div>


<!-- Dito na tayo sa pag aupdate ng room -->

<!-- <script>

$(document).ready(function (){

$('.editBtn').on('click', function(){
            console.log("Clikced")
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            
                            
                            
                            
            $('#cur_Image').val(data[0]);  
                            
            
        });

})

</script>             -->

</body>
 
</html>




                
<!-- </section> -->


