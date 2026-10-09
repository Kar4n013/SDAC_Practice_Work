<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = $conn -> prepare('
    select password from users where email = ?
    ');

    $sql -> bind_param('s',$_POST['email']);
    $sql -> execute();
    $sql -> bind_result($password);
    $sql -> fetch();

    if (password_verify($_POST['pass'],$password)) {
        $_SESSION['email'] = $_POST['email']; 
        header("Location:Project_Dashboard.php");
    }else {
        echo '<script>alert("Wrong email or password!!");</script>';
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
            ;">Login!!</h2>
           

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


