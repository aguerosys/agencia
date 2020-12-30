<?php
    require 'config/config.php';
    include 'includes/over-all-header.html';
    include 'includes/nav.php';

    if (isset($_SESSION['email'])){
        header('location: index.php' );
    }
?>

    <main class="container">

        <h1>Login</h1>

           
        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="login.php" method="post">

                <div class="form-group">
                    <p class="form-text">Email</p>
                    <input class="form-control" type="text" name="email" id="" required> 
                    <p class="form-text">Password</p>
                    <input class="form-control" type="password" name="password" id="" required>
                </div>
                <button class="btn btn-dark">Ingresar</button>               
            </form>

        </div>
         

    </main>

<?php
    include 'includes/footer.php';
?>