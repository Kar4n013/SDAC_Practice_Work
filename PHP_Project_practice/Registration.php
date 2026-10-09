<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $sql = $conn -> prepare('
    insert into users (name,email,phone,city,password) values (?,?,?,?,?)
    ');

    $sql -> bind_param('ssiss',$_POST['name'],$_POST['email'],$_POST['phone'],$_POST['city'],$pass);
    if ($sql->execute()) {
        header("Location:Login.php");
    }else {
        echo '<script>alert("email already exists!!");</script>';
    }

    }
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Registration</title>
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
                <div class="formbox mx-auto p-2 w-25">
                <h2 style="text-align: center; margin: 25px
                ;">Register!!</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        aria-describedby="helpId"
                        placeholder="Enter Name"
                    />
                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        aria-describedby="helpId"
                        placeholder="Enter Email"
                    />
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input
                        type="number"
                        class="form-control"
                        name="phone"
                        id="phone"
                        aria-describedby="helpId"
                        placeholder="Enter Phone Number"
                    />
                    
                </div>
        
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input
                        type="text"
                        class="form-control"
                        name="city"
                        id="city"
                        aria-describedby="helpId"
                        placeholder="Enter City name"
                    />
                
                </div>
                
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id="pass"
                        aria-describedby="helpId"
                        placeholder="Enter Password"
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


