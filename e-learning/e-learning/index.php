<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>เริ่มต้น</title>
    <style>
        body {
            background-image: url('images/2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            align-items: center; 
        }
        .container{
            background-color: white;
            padding: 20px 30px;
            background-position: center;
            text-align:center;
            max-width: 400px;

        }
        
        .header-nav a { 
            color: white;
            font-weight: bold;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .button-container button {
            width: 200px;
            padding: 15px;
            margin: 10px;
            background: linear-gradient(to right, #28a745, #218838);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .button-container button:hover {
            transform: scale(1.1);
            background: linear-gradient(to right, #218838, #28a745);
        }
    </style>
</head>

<body>
   
        <header class="d-flex justify-content-center py-3 header-nav">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">สร้างห้องสอบ</a></li>
                <li class="nav-item"><a href="#" class="nav-link">สร้างห้องเข้าสอบ</a></li>
                <li class="nav-item"><a href="#" class="nav-link">ข้อสอบของฉัน</a></li>
                <li class="nav-item"><a href="#" class="nav-link">ข้อมูลทั้งหมด</a></li>
            </ul>
        </header>
       <div class="container">
       <div class="text-center">
            <div class="title">Kobelco Construction Machinery Southeast Asia Co., Ltd.</div>
            <div class="button-container">
                <button onclick="window.location.href='login.php'">ผู้ใช้งาน</button>
                <button onclick="window.location.href='homepage.php'">ผู้ลงข้อสอบ</button>
            </div>
        </div>
    </div>
       </div>
</body>

</html>
