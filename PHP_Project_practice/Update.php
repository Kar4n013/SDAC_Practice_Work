<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $sql = $conn -> prepare('
    select * from products where id = ?
    ');


    $sql -> bind_param('i',$_GET['id']);
    $sql -> execute();
    $data = $sql -> get_result()->fetch_assoc();

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = $conn -> prepare('
    update products set name = ? ,category = ? ,price = ?,quantity = ? where id = ?
    ');

    $product -> bind_param('ssisi',$_POST['name'],$_POST['category'],$_POST['price'],$_POST['quantity'],$_GET['id']);
    if ($product->execute()) {
        echo '<script>alert("Product Updated successfully!!")</script>';
        header("Location: Project_Dashboard.php");
        exit();
    }
    }

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Update</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        
        <main>
             <form action="" method="post">
            <div class="updateproductbox mx-auto p-2 w-25 mb-5">
            <h2 style="text-align: center; margin: 25px
            ;">Update Products</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    value="<?= $data['name'] ?>"
                    aria-describedby="helpId"
                    placeholder="Enter Product Name"
                />
                
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input
                    type="text"
                    class="form-control"
                    name="category"
                    id="category"
                    value="<?= $data['category'] ?>"
                    aria-describedby="helpId"
                    placeholder="Enter category"
                />
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Price</label>
                <input
                    type="number"
                    class="form-control"
                    name="price"
                    id="price"
                    value="<?= $data['price'] ?>"
                    aria-describedby="helpId"
                    placeholder="Enter price"
                />
                
            </div>
    
            <div class="mb-3">
                <label for="quantity" class="form-label">quantity</label>
                <input
                    type="text"
                    class="form-control"
                    name="quantity"
                    id="quantity"
                    value="<?= $data['quantity'] ?>"
                    aria-describedby="helpId"
                    placeholder="Enter quantity"
                />
               
            </div>
        
            <button
                type="submit"
                class="btn btn-primary"
            >
                Submit
            </button>
            

            </div>
            </form>

            </div>

        </main>
       
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
