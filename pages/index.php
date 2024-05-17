<!DOCTYPE html>
<html  >
<head>
    <title>إضافة مستخدم جديد</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="bg-dark text-light" >
<div class="container mt-5">
    <h2>إضافة مستخدم جديد</h2>
    <div id="message"></div>
    <form id="addUserForm">
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">رقم الهاتف:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">إضافة المستخدم</button>
        <a href="view_users.php" class="btn btn-secondary">عرض المستخدمين</a>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#addUserForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '../add_user.php',
                data: formData,
                success: function(response) {
                    $('#message').html('<div class="alert alert-success">' + response + '</div>');
                },
                error: function() {
                    $('#message').html('<div class="alert alert-danger">حدث خطأ أثناء إضافة المستخدم.</div>');
                }
            });
        });
    });
</script>
</body>
</html>
