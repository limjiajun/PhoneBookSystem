<!DOCTYPE html>
<html>
<head>
    <title>Phonebook System</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            color: #000; /* Changed text color to black */
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .container {
            max-width: 1200px; /* Center and limit container width */
            margin: 0 auto;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            border: 1px solid #ddd; /* Added border */
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
            border-bottom: 1px solid #ddd; /* Added border */
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table {
            width: 100%; /* Full width */
            margin-bottom: 1rem; /* Space below table */
            border-collapse: collapse; /* Ensure borders are not doubled */
            border: 1px solid #ddd; /* Border around table */
        }
        table.table th, table.table td {
            border: 1px solid #ddd; /* Border for table headers and cells */
            padding: 12px 15px;
            vertical-align: middle;
            font-weight: bold; /* Changed text to bold */
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table td a {
            font-weight: bold;
            color: #000; /* Changed text color to black */
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            margin: 20px 0 0; 
            text-align: center;
        }
        .pagination li {
            display: inline;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a {
            background: #03A9F4;
            color: #fff;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled a {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px;
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        .btn-create {
            background: #435d7d;
            color: #fff;
            border-radius: 3px;
            border: none;
            font-size: 13px;
        }
        .btn-create:hover {
            background: #34495e;
            color: #fff;
        }
        /* Responsive design for table */
        @media (max-width: 768px) {
            table.table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }
            .table-wrapper {
                padding: 10px;
                box-shadow: none;
            }
        }
    
    </style>
</head>
<body>
<div class="container mt-4">
<div class="text-center mb-4">
        <h2>Phone Book System</h2>
    </div>

    <div class="text-center mb-4">
        <?php if ($this->session->userdata('UserLoginSession')): ?>
            <?php $udata = $this->session->userdata('UserLoginSession'); ?>
            <div class="alert alert-info mb-2">
                Welcome, <?= $udata['email']; ?>
            </div>
            <div class="text-end">
            <a href="<?= base_url('welcome/logout') ?>" class="btn btn-primary">Logout</a>
        </div>
            <!-- <a href="<?= base_url('welcome/logout') ?>" class="btn btn-primary ">Logout</a> -->
        <?php else: ?>
            <?php redirect(base_url('welcome/login')); ?>
        <?php endif; ?>
    </div>



    

        <div class="table-wrapper">
            <h1 class="mb-4">Record List</h1>
            <div class="text-end mb-4">
        <a href="<?= base_url('phonebook/add') ?>" class="btn btn-primary">Add Record</a>
    </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($records)): ?>
                        <?php $no = $this->uri->segment(3, 0) + 1; ?>
                        <?php foreach ($records as $record): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $record['name']; ?></td>
                                <td><?= $record['email']; ?></td>
                                <td><?= $record['phone']; ?></td>
                                <td>
                                    <?php if (!empty($record['image'])): ?>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="<?= base_url('assets/images/' . $record['image']); ?>">
                                            <img src="<?= base_url('assets/images/' . $record['image']); ?>" alt="Image" class="img-fluid" style="max-width: 100px; cursor: pointer;">
                                        </a>
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('phonebook/edit/'.$record['id']) ?>" class="btn btn-warning">Edit</a>
                                    <br><br>
                                    <a href="<?= base_url('phonebook/delete/'.$record['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                <?= $pagination; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>
