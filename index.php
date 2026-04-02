<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST["name"];
    $age=$_POST["age"];
    $add=$_POST["address"];
    $email=$_POST["email"];
    $pass= password_hash($_POST["pass"],PASSWORD_BCRYPT);

    $sql=$conn->prepare("insert into user values(?,?,?,?,?)");
    $sql->bind_param("sisss",$name,$age,$add,$email,$pass);

    if ($sql->execute()) {
        header("Location:login.php");
    }
}



?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h2 class="text-center p-4">Register</h2>
            <div
                class="container text-center shadow rounded p-4 col-6"
            >
                <form action="" method="post">

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="age"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Age</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="address"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Email</label>
                
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Password</label>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Register
                </button>
                
                
            </div>
            
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
