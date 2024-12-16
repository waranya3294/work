<?php
require_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>สร้างห้องเข้าสอบ</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus,
        select:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .form-buttons {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4a90e2;
            color: white;
        }

        button[type="button"] {
            background-color: #e74c3c;
            color: white;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <form id="examForm" action="javascript:void(0);">
        <div class="wrapper">
            <h1>สร้างห้องสอบ</h1>
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">ชื่อหัวข้อสอบ</label>
                    <input type="text" id="name" name="name" required><br>
                </div>

                <div class="form-group">
                    <label for="text">ตั้งรหัสเข้าห้องสอบ</label>
                    <input type="text" name="text" id="text" maxlength="4" required pattern="\d{4}" title="กรุณาใส่ตัวเลข">
                </div>

                <div class="form-group">
                    <label for="category">หมวดหมู่</label>
                    <select id="category" name="category" required>
                        <option value="">เลือกหมวดหมู่</option>
                        <option value="สี">สี</option>
                        <option value="เชื่อม">เชื่อม</option>
                        <option value="ประกอบ">ประกอบ</option>
                        <option value="แวร์เฮาส์">แวร์เฮาส์</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">วันที่และเวลา</label>
                    <input type="datetime-local" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="description">รายละเอียดการสอบ</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-buttons">
                    <button type="submit">บันทึก</button>
                    <button type="submit" onclick="window.location.href='exam.php'">ยกเลิก</button>

                </div>
            </div>
        </div>
    </form>
    <script>
        $("#examForm").on("submit", function () {
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: 'create-form.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert(response);
                },
                error: function () {
                    alert('เกิดข้อผิดพลาด');
                }
            });
        });
    </script>
</body>

</html>