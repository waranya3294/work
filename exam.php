<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างห้องสอบ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .no-data {

            color: #0056b3;
            font-size: 20px;
            font-weight: bold;

        }

        .logo-img {
            width: 120px;
            height: auto;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #D2A599;
            position: fixed;
            top: 0;
            left: 0;
            transition: width 0.3s;
        }

        .sidebar .logo {
            padding: 20px;
            text-align: center;
        }

        .sidebar .logo img {
            width: 100%;
            max-width: 150px;
        }

        .menu {
            list-style-type: none;
            padding: 0;
        }

        .menu li {
            padding: 15px;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .toggle-btn {
            position: absolute;
            top: 20px;
            right: -20px;
            background-color: #333;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .main-content {
            padding: 20px;
            min-height: 100vh;
            overflow-y: auto;
            flex-grow: 1;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .menu li {
            font-size: 12px;
        }

        .sidebar.collapsed+.main-content {
            margin-left: 80px;
        }

        .card-footer {
            margin: 0;
            background-color: #f8f9fa;
            text-align: right;
        }

        .btn-custom {
            margin: 5px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
        }

        .btn-green {
            background-color: #28a745;
        }

        .btn-yellow {
            background-color: #ffc107;
        }

        .btn-blue {
            background-color: #007bff;
        }

        .btn-red {
            background-color: #dc3545;
        }

        button {
            padding: 10px 20px;
            font-size: 20px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button i {
            margin-right: 8px;
        }

        button:hover {
            background-color: #0056b3;
        }


        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            color: #495057;
            font-size: 1.1rem;
            padding: 10px 15px;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
            background-color: #f1f1f1;
        }

        .navbar-nav .nav-link.active {
            color: rgb(19, 18, 18);
            /* background-color: #007bff; */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.3rem;
            color: #007bff;
        }

        .navbar-nav {
            margin-left: auto;
        }

        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }

            .col-md-4 {
                flex: 1 1 100%;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="d-flex justify-content-center py-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <div class="container-fluid">
                <img src="images/logo.png" alt="logo" class="logo-img">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="room.php" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="room.php" class="nav-link" title="สร้างห้องสอบ">สร้างห้องสอบ</a>
                        </li>
                        <li class="nav-item">
                            <a href="exam.php" class="nav-link" title="สร้างข้อสอบ">สร้างข้อสอบ</a>
                        </li>
                        <li class="nav-item">
                            <a href="summary.php" class="nav-link" title="ข้อมูลทั้งหมด">ข้อมูลทั้งหมด</a>
                        </li>
                    </ul>
                    <a href="logout.php" title="ออกจากระบบ"><i class="bi bi-box-arrow-left"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <div class="main-content">
        <h1 class="text-center">สร้างชุดข้อสอบ</h1>
        <button onclick="window.location.href='form.php'" title="สร้างห้องสอบ">
            <i class="bi bi-plus-circle-fill"></i>สร้างชุดข้อสอบ
        </button>
        <!-- แสดงห้องสอบที่สร้าง้สร็จ -->
        <?php
        try {
            require_once("connection.php");
            $conn = new MyConnection();
            $pdo = $conn->getPdo();

            $selectdata = "SELECT form_id, form_name, form_category, form_description, form_date ,form_code FROM tbl_form";
            $stmt = $pdo->prepare($selectdata);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo "<p class='text-danger'>Error: " . $th->getMessage() . "</p>";
        }
        ?>

        <?php if (!empty($result)) : ?>
            <?php foreach ($result as $row) : ?>
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="card shadow-sm h-100 card-custom">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><strong>category:</strong> <?= htmlspecialchars($row['form_category']) ?></h5>
                                <p class="card-text">
                                    <strong>รหัสเข้าห้องสอบ:</strong> <?= htmlspecialchars($row['form_code']) ?><br>
                                    <!-- <strong>ชื่อผู้สร้าง:</strong> <?= htmlspecialchars($row['form_name']) ?><br> -->
                                    <strong>วันที่และเวลา:</strong> <?= htmlspecialchars($row['form_date']) ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="exam_form.php" class="btn btn-success btn-sm" title="สร้างข้อสอบ"><i class="bi bi-file-earmark-font"></i></a>
                                <a href="#" class="btn btn-warning btn-sm" title="แก้ไข"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-primary btn-sm" title="ดู"><i class="bi bi-eye-fill"></i></a>
                                <div class="btn btn-danger" onclick="deleteMainTopic(<?= htmlspecialchars($row['form_id']) ?>)" title="ลบ">
                                    <i class="bi bi-trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center text-muted">
                <p class="no-data">ไม่พบข้อมูล</p>
                <p> หากต้องการสร้างข้อมูลใหม่ สามรถกดปุ่ม สร้างห้องสอบ</p>
            </div>
        <?php endif; ?>
    </div>
    <script>
        function deleteMainTopic(form_id) {
            // console.log("ID: " + form_id);
            Swal.fire({
                icon: 'warning',
                title: 'ลบหัวข้อสอบ ?',
                text: 'Test',
                confirmButtonColor: 'red',
                cancelButtonColor: 'secondary',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("ID: " + form_id);
                } else {
                    window.location.reload();
                }
            })
        }
    </script>
</body>

</html>