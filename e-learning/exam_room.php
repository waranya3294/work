<?php
require_once("connection.php");

if (isset($_GET['room_id'])) {
    $room_id = intval($_GET['room_id']); // ตรวจสอบความปลอดภัยด้วย intval

    try {
        $sql = "SELECT * FROM tbl_exam_rooms_new WHERE exam_rooms_id = :room_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':room_id' => $room_id]);

        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($room) {
            echo "<h1>รายละเอียดห้องสอบ</h1>";
            echo "<p>ชื่อหัวข้อสอบ: " . htmlspecialchars($room['exam_rooms_name']) . "</p>";
            echo "<p>หมวดหมู่: " . htmlspecialchars($room['exam_rooms_category']) . "</p>";
            echo "<p>วันที่และเวลา: " . htmlspecialchars($room['exam_date']) . "</p>";
            echo "<p>รายละเอียด: " . htmlspecialchars($room['exam_rooms_description']) . "</p>";
            echo "<p>รหัสเข้าห้อง: " . htmlspecialchars($room['room_code']) . "</p>";
            echo '<a href="enter-room.php?room_id=' . $room_id . '">เข้าสู่ห้องสอบ</a>';
        } else {
            echo "ไม่พบข้อมูลห้องสอบ!";
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
} else {
    echo "ไม่พบรหัสห้องสอบ!";
}
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
    <form action="create-room.php" method="POST">
        <div class="wrapper">
            <h1>สร้างห้องเข้าสอบ</h1>
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">ชื่อหัวข้อสอบ</label>
                    <input type="text" id="name" name="name" required><br>
                </div>

                <div class="form-group">
                    <label for="text">ตั้งรหัสเข้าห้องสอบ</label>
                    <input type="text" name="text" id="text" maxlength="4"  required>
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
                    <button type="submit" onclick="showData()">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function showData() {

            var name = $("#name").val();
            var category = $("#category").val();
            var text = $("#text").val();
            var date = $("#dete").val();
            var description = $("#description").val();

            var formData = new FormData();

            FormData.append("name", name);
            FormData.append("category", category);
            FormData.append("date", date);
            FormData.append("description", description);

            $.ajax({
                type: 'POST',
                url: 'create-room.php',
                data: FormData(),
                contentType: false,
                processData: false,
                success: function(response) {

                }
            })
        }
    </script>
</body>


</html>