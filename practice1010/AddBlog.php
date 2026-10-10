<?php
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location:Login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$sql = $conn -> prepare('
insert into blogs (title,description,image,userid) values (?,?,?,?)
');    
$content = $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"uploads/$content");
$sql -> bind_param('sssi',$_POST['title'],$_POST['description'],$content,$_SESSION['id']);
if ($sql->execute()) {
    header("Location:BlogDashboard.php");
}
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Add Blog</title>
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
                class="container text-center col-5 shadow my-3 p-3"
            > 
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Add Blog</h2>

                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        id=""
                        aria-describedby="helpId"
                        placeholder="title"
                    />
                    
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <input
                        type="textbox"
                        class="form-control"
                        name="description"
                        id=""
                        aria-describedby="helpId"
                        placeholder="description"
                    />
                    
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Choose file</label>
                    <input
                        type="file"
                        class="form-control"
                        name="image"
                        id=""
                        placeholder=""
                        aria-describedby="fileHelpId"
                    />
                    
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Submit
                </button>
                
                
                
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
