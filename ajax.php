<?php

    $con = mysqli_connect("localhost","root","","product");

    $action = $_POST["action"];
    if($action == "Insert"){
        
        $product_name = $_POST["name"];
        $product_type = $_POST["description"];
        $image = $_FILES["image"]["name"];


        $sql = "insert into products (product_name,product_type,image) values ('{$product_name}','{$product_type}','{$image}')";
        if($con->query($sql)){
            $id = $con->insert_id;
            move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);
            echo "<tr uid='{$id}'>
            <td>{$id}</td>
            <td>{$product_name}</td>
            <td>{$product_type}</td>
            <td><img id='imgsrc' name='image' src='images/{$image}' alt='image'></td>
            <td>
                <button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModalCenter' edit>Edit</button>
            </td>
            <td><button type='button' class='btn btn-danger' id='tabledelete'>Delete</button></td>
            </tr>"; 
        }
        else{
            echo false;
        }
    }
    else if($action == "Update"){
        $id =$_POST["id"];
        $product_name = $_POST["name"];
        $product_type =$_POST["description"];
        if($image = $_FILES["image"]["name"]){
            $sql = "update products SET product_name='{$product_name}',product_type='{$product_type}',image='{$image}' where id='{$id}'";
        }else{
            $sql = "update products SET product_name='{$product_name}',product_type='{$product_type}' where id='{$id}'";
        }
        
        if($con->query($sql)){
            move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);
            echo "
            <td>{$id}</td>               
            <td>{$product_name}</td>
            <td>{$product_type}</td>
            <td><img id='imgsrc' src='image/{$image}' alt='image'></td>
            <td><button type='button' class='btn btn-primary edit' data-toggle='modal' data-target='#exampleModalCenter' >Edit</button>
            <td><button type='button' class='btn btn-danger delete' id='tabledelete'>Delete</button></td>
            </td>
            "; 
        }
        else{
            echo false;
        }
    }
    else if($action == "Delete"){
        $id = $_POST["uid"];
        $sql = "delete from products where id='{$id}'";
        if($con->query($sql)){
            echo true;
        }else{
            echo false;
        }
    }

?>