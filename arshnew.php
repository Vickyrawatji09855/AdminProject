
<?php
require("config.php");
// require("submit.php");
?>
    <?php
    if (isset($_POST['signin'])) {
        echo "conected";
        echo $_POST['AdminPassword'];


        // ***************************************************************************



        // $query = "SELECT * FROM `admin-login` WHERE `Admin-Name`='$_POST[AdminName]' AND `Admin-Password`='$_POST[AdminPassword]'";
        // $result = mysqli_query($con, $query);
        // if (mysqli_num_rows($result) == 1) {
        //     echo "conect";
        // } else {
        //     echo "not cenect";
        // }
    }
    else{
        echo"cannot conected";
    }


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> -->
</head>

<body>
    <section id="login-admin">
        <div class="from-admin-login">
            <form method="POST" action="" class="admin-login-form">
                <table>
                    <tr class="login-form-div">
                        <td>
                            <label for="user" class="admin-user">User Name</label>
                        </td>
                        <td>
                            <input type="text" name="AdminName">
                        </td>
                    </tr>
                    <tr class="login-form-div">
                        <td>
                            <label for="password" class="admin-user">Password</label>

                        </td>
                        <td>
                            <input type="password" name="AdminPassword">

                        </td>
                    </tr>
                </table>

                <button class="login-btn" type="submit" name="signin" >Sign in</button>
                <!-- <input type="submit" class="login-btn" name="signin" value="Sign in"> -->

            </form>
        </div>
    </section>

</body>

</html>