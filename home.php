<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 20px;
        }

        #mother {
            width: 100%;
            padding: 1px;
        }

        main {
            float: right;
            width: 70%;
            text-align: center;
        }

        aside {
            float: left;
            width: 25%;
            text-align: center;
            padding: 20px;
            background-color: #333;
            box-shadow: 0 0 15px 0 #39ff14;
        }

        h2,
        h3 {
            color: #39ff14;
        }

        h3 {
            padding-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 15px 0 #39ff14;

        }

        th,
        td {
            border: 1px solid #39ff14;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #444;
        }

        tr:hover {
            background-color: #444;
        }

        img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
            box-shadow: 0 0 15px 0 #39ff14;
        }

        label,
        input {
            display: block;
            margin: 18px auto;
            width: 80%;
            padding: 5px;
            font-size: 20px;
            text-align: center;
        }

        button {
            background-color: #39ff14;
            border: none;
            color: #1a1a1a;
            padding: 10px 20px;
            cursor: pointer;
            margin: 22px;
            font-size: 20px;
            box-shadow: 0 0 15px 0 #39ff14;
        }

        button:hover {
            background-color: #29a10d;
        }
    </style>
</head>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "students";
    $con = mysqli_connect($host, $user, $pass, $db);
    $read = "SELECT * FROM `info`";
    $sql1 = mysqli_query($con, $read);
    $id = "";
    $name = "";
    $email = "";
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['add'])) {
        $add = "INSERT INTO `info` VALUES($id,'$name','$email')";
        $sql2 = mysqli_query($con, $add);
        header('location: home.php');
    }
    if (isset($_POST['del'])) {
        $del = "DELETE FROM `info` WHERE `name` = '$name'";
        $sql2 = mysqli_query($con, $del);
        header('location: home.php');
    }
    ?>
    <div id='mother'>
        <form method="POST" action="">
            <aside>
                <div id='son1'>
                    <img src="logo.png" alt="website logo">
                    <h3>Student Registration</h3>
                    <label for="id">Student ID</label>
                    <input type="text" name="id" id="id">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" id="name">
                    <label for="email">Student Email</label>
                    <input type="email" name="email" id="email">
                    <button name="add">Add</button>
                    <button name="del">Delete</button>
                </div>
            </aside>
            <main>
                <h2>Students List</h2>
                <table id="tab">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($sql1)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>

</html>