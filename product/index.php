



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>

    <div class="addproduct">
    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModalCenter">
    Add Products
    </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="frm">
        <div class="modal-body">

        
                <input type="hidden" name="action" id='action' value="Insert">
                <input type="hidden" name="id" id='uid' value="0">
                <div class="did-floating-label-content">
                    <input class="did-floating-input" name="name" id="name" type="text" placeholder=" " autocomplete="off" required>
                    <label class="did-floating-label">Product Name</label>
                </div>
                <div class="did-floating-label-content">
                    <input class="did-floating-input" name="description" id="description" type="text" placeholder=" " autocomplete="off" required>
                    <label class="did-floating-label">Description</label>
                </div>
                

                <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg"  onchange="previewFile()" />
                    <label class="plusicon" for="imageUpload"><i class="fa-solid fa-plus"></i></label>
                </div>
                <div class="avatar-preview">
                    <img id="imagePreview" src="imgbackground.png">
            
                </div>
            </div>

                
            
        </div>
        <div class="modal-footer">
            <input type="button" value="Close" class="btn btn-danger closebtn" data-dismiss="modal"></input>
            <input type="submit" value="Submit" name="submit" class="btn btn-success submit"></input>
        </div>
        </form>

        </div>
    </div>
    </div>
    </div>

      <div class="tablecontainer">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>S.No</th>
                        <th>Prduct Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            $con = mysqli_connect("localhost","root","","product");
                            $sql = "select * from products ORDER BY id ASC";
                            $res = $con->query($sql);
                            while($row = $res->fetch_assoc()){
                                echo "
                                    <tr uid='{$row["id"]}'>
                                        <td>{$row["id"]}</td>
                                        <td>{$row["product_name"]}</td>
                                        <td>{$row["product_type"]}</td>
                                        <td src='images/{$row["image"]}'><img id='imgsrc' src='images/{$row["image"]}' alt='image'></td>
                                        <td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModalCenter'>Edit</button></td>
                                        <td><button type='button' class='btn btn-danger delete' id='tabledelete'>Delete</button></td>
                                    </tr>
                                ";
                            }
                        ?>

                       
                    </tbody>
                </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="index.js"></script>
    
</body>
</html>