<?php
$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=toor");

$search = $_GET['search'] ?? "";

$query = "SELECT * FROM users WHERE name ILIKE '%$search%' OR phone ILIKE '%$search%'";
$result = pg_query($db_connection, $query);
?>

<!DOCTYPE html>
<html >
<head>
    <title>عرض المستخدمين</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light" >
<div class="container mt-5">
    <h2>عرض المستخدمين</h2>
    <form action="view_users.php" method="get" >
        <div class="form-group">
            <label for="search">البحث عن المستخدم:</label>
            <input type="text" class="form-control" id="search" name="search" value="<?php echo $search; ?>">
            <button type="submit" class="btn btn-primary mt-2">بحث</button>
            <a href="index.php" class="btn btn-secondary mt-2   ">الصفحة الرئيسية</a>

        </div>
    </form>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="color: white;">الاسم</th>
            <th style="color: white;">رقم الهاتف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr><td style='color: white;'>{$row['name']}</td><td style='color: white;'>{$row['phone']}</td></tr>";
        }
        pg_close($db_connection);
        ?>
        </tbody>
    </table>

</div>
</body>
</html>
