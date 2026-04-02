<?php

include "db.php";
$result=$conn->query("select * from employee");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST["name"];
    $salary=$_POST["salary"];
    $designation=$_POST["designation"];
    $email=$_POST["email"];
    $year=$_POST["year"];

    $sql=$conn->prepare("insert into employee (name,salary,designation,email,year) values(?,?,?,?,?)");
    $sql->bind_param("sdssi",$name,$salary,$designation,$email,$year);

    if ($sql->execute()) {
        header("Location:home.php");
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
             <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
             >
                <div class="container">
                    <a class="navbar-brand" href="#"><h2>Hello<?=$_SESSION["name"]?></h2></a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Dropdown</a
                                >
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >
                                    <a class="dropdown-item" href="#"
                                        >Action 1</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        >Action 2</a
                                    >
                                </div>
                            </li>
                        </ul>
                        <form class="d-flex my-2 my-lg-0">
                        <a
                            name="logout"
                            id=""
                            class="btn btn-primary"
                            href="login.php"
                            role="button"
                            >Log out</a
                        >
                        
                        </form>
                    </div>
                </div>
             </nav>
             
        </header>
        <main>
            <h3 class="text-center my-3">Add Employee</h3>
            <div
                class="container text-center col-5 shadow rounded bordered p-4"
            >
                <form action="" method="POST">
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
                            name="salary"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Salary</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="designation"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Designation</label>
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
                            type="text"
                            class="form-control"
                            name="year"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Year of Experience</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Add
                    </button>
                    
                    
                    
                    
                    
                    
                </form>
            </div>

            <div
                class="container text-center col-8 my-5"
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Email</th>
                                <th scope="col">year of Experience</th>
                                <th scope="col">Action 1</th>
                                <th scope="col">Action 2</th>
                            </tr>
                        </thead>
                        <?php  while ($row=$result->fetch_assoc()) {
                        ?>
                        <tbody>
                            <tr class="">
                                <td scope="row"><?=$row["id"]?></td>
                                <td scope="row"><?=$row["name"]?></td>
                                <td><?=$row["salary"]?></td>
                                <td><?=$row["designation"]?></td>
                                <td><?=$row["email"]?></td>
                                <td><?=$row["year"]?></td>
                            
                           <td><a
                                        name=""
                                        id=""
                                        class="btn btn-primary"
                                        href="edit.php?id=<?=$row['id']?>"
                                        role="button"
                                        >Edit</a
                                    ></td>
                                

                                <td><a
                                        name=""
                                        id=""
                                        class="btn btn-primary"
                                        href="delete.php?id=<?=$row['id']?>"
                                        role="button"
                                        >Delete</a
                                    ></a></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php
                        }?>
                    </table>
                </div>
                
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
