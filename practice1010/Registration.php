<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    $sql = $conn -> prepare(
        "insert into users (name,email,password) values (?,?,?)"
    );
    $sql ->bind_param("sss",$_POST['name'],$_POST['email'],$pass);
    if ($sql->execute()) {
       
        header("location:Login.php");
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

        <div
            class="container text-center"
        >
        <div
        class="container col-5 my-4 shadow p-3"
        >
        <h2>Register</h2>
            <form action="" method="post">

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder=""
                />
                <label for="formId1">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder=""
                />
                <label for="formId1">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="pass"
                    id="pass"
                    placeholder=""
                />
                <label for="pass">Password</label>
            </div>
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit
                </button>
                
            
            

                </form>    
            </div>
            


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
