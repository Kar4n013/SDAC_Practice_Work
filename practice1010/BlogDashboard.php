<?php
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location:Login.php');
}

$sql = $conn -> query("
    select blogs.*,users.name from blogs join users on blogs.userid = users.id
");


?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>dashboard</title>
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
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container d-flex justify-content-space-evenly">
                    <h2>hello <?php echo $_SESSION['name'];?> </h2>
                    <div
                        class="container d-flex gap-2"
                    >
                        
                        
                        <form class="d-flex gap-2 my-2 my-lg-0" action="AddBlog.php">
                            
                            <button
                            class="btn btn-outline-success my-2 my-sm-0"
                            type="submit"
                            >
                            Add Blog🦣
                        </button>
                    </form>
                    
                    <form class="d-flex my-2 my-lg-0" action="Logout.php">
                        
                        <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                        >
                        Log Out
                    </button>
                </form>
            </div>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            
        <div
            class="container"
        >
            <div class="row">
                <?php while ($row = $sql ->fetch_assoc()) {
                ?>
                <div class="col-4 mb-2">
                    <div class="card">
        <img class="card-img-top" style="height:400px width: 900" src="uploads/<?= $row["image"] ?>" alt="Title" />
                        <div class="card-body">
                            <small><?= $row['name'] ?></small>
                            <h3 class="card-title"><?= $row['title'] ?></h3>
                            <p class="card-text"><?= $row['description'] ?></p>
                            
                            <?php 
                   if ($row['userid'] == $_SESSION['id']) {
                       ?>

<form action="Update.php" method="GET">
    
        <input type="number" name = "id" value = "<?= $row['id'] ?>">

    <button
    type="submit"
    class="btn btn-primary my-2"
    >
    Update
</button>

</form>
<form action="Delete.php" onsubmit="return confirm('Are you sure to delete this item?')" method="GET">
    <input type="hidden" name="<?= $row['id'] ?>">
    <button
    type="submit"
    class="btn btn-primary my-2"
    >
    Delete
</button>
</form>

<?php }?>
</div>
</div>

</div>
                
                <?php } ?>
            </div>
            
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
        ></script>
    </body>
</html>
