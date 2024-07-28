<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Record</title>

    <style>
        .container {
            max-width: 600px; /* Adjust container width */
            margin: 0 auto; /* Center container */
            padding: 20px;
            background: #f9f9f9; /* Light background color for better visibility */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        .form-group {
            margin-bottom: 15px; /* Space between form groups */
        }
        .form-control {
            font-size: 16px; /* Adjust font size */
            padding: 10px; /* Increase padding for better spacing */
        }
        .btn-primary {
            font-size: 16px; /* Adjust font size for button */
            padding: 10px 20px; /* Adjust padding for button */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add New Record</h1>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?= form_open_multipart('phonebook/add'); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>">
                <?= form_error('name'); ?>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= set_value('phone'); ?>">
                <?= form_error('phone'); ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                <?= form_error('email'); ?>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control"><?= set_value('address'); ?></textarea>
                <?= form_error('address'); ?>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Sumbit</button>
            </div>
           
        <?= form_close(); ?>
        <div class="text-left mt-4">
            <form action="<?php echo site_url('phonebook/dashboard'); ?>" method="get">
                <button type="submit" class="btn btn-primary">Back</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TI0w4sH6M8W/vzvBRw6zMZyXK6aT2Xp6f+k7B8CQO7bd33ajL5U" crossorigin="anonymous"></script>
</body>
</html>
