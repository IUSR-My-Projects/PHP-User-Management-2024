<?php
$db_connection = pg_connect("host=localhost dbname=postgres user=postgres password=toor");

$name = $_POST['name'];
$phone = $_POST['phone'];

$query = "INSERT INTO users (name, phone) VALUES ('$name', '$phone')";
$result = pg_query($db_connection, $query);

if ($result) {
    echo "تم إضافة المستخدم بنجاح.";
} else {
    echo "حدث خطأ أثناء إضافة المستخدم.";
}

pg_close($db_connection);
?>
