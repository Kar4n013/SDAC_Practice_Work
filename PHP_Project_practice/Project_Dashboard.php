<?php
include 'db.php';

 $sql = $conn -> prepare('
    select name from users where email = ?
    ');

    $sql -> bind_param('s',$_SESSION['email']);
    $sql -> execute();
    $sql -> bind_result($name);
    $sql -> fetch();

    $_SESSION['name'] = $name;
    $sql -> free_result();

    $getproducts = $conn -> prepare('
    select * from products where supplier = ?
    ');
    $getproducts -> bind_param('s',$_SESSION['email']);
    $getproducts -> execute();
    
    $result = $getproducts -> get_result();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = $conn -> prepare('
    insert into products (name,category,price,quantity,supplier) values (?,?,?,?,?)
    ');

    $product -> bind_param('ssiis',$_POST['name'],$_POST['category'],$_POST['price'],$_POST['quantity'],$_SESSION['email']);
    if ($product->execute()) {
        echo '<script>alert("Product Registered successfully!!")</script>';
        header("Location: Project_Dashboard.php");
        exit();
    }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $delete = $conn -> prepare('
    delete from products where id = ?
    ');

    $delete -> bind_param('s',$_GET['id']);
    $delete -> execute();
    

    }

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Dashboard</title>
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
        <header>
    <nav
        class="navbar navbar-expand-md navbar-light bg-light"
    >
        <div class="container d-flex justify-content-between my-2 my-lg-0">
            
        <h2>hello <?= $_SESSION['name'] ?> </h2>

            
        <div class="d-flex gap-3">

            <form action="DownloadExcel.php">
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
            Download Excel                    </button>
                </form>       

                <form action="Logout.php">
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Log out
                    </button>
                </form>
                </div>
    </div>            
    </nav>
    
    </header>
        <main>

           <div class="viewproducts mx-3 my-3 text-center">
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                        
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td class="d-flex justify-content-evenly">
                                <form action="update.php" method="get" id="<?= $row['id'] ?>">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button
                                    type="submit"
                                    class="btn btn-warning"
                                    >
                                    Update
                                </button>
                                
                            </form>
                            <form method="get" >
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >
                                        Delete
                                    </button>
                                    
                                </form>
                            </td>
                        </tr>

                        <?php
                        }
                        ?>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>


         <form action="" method="post">
            <div class="insertproductbox mx-auto p-2 w-25 mb-5">
            <h2 style="text-align: center; margin: 25px
            ;">Insert Products!!</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
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
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        >
    

    </script>
    </body>
</html>

