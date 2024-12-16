<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            padding: 100px 100px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #8fdfc3; /* สีเขียวมิ้น */
            text-align: center;
        }

        .form-container:hover {
            box-shadow: 0 0 15px #8fdfc3; /* เรืองแสง */
        }

       .logo{
        width: 300px;
        height: 100px;
        padding: 5px;
       }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #8fdfc3; /* กรอบสีเขียวมิ้น */
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(143, 223, 195, 0.5);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #6fc9a8; /* สีเข้มขึ้น */
            box-shadow: 0 0 10px #8fdfc3; /* เรืองแสงเมื่อโฟกัส */
            outline: none;
        }

        button {
           
            padding: 12px;
            margin: 5px 0;
            background: linear-gradient(to right, #8fdfc3, #6fc9a8);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }


        button:last-child {
            background: linear-gradient(to right, #6fa8dc, #4a90e2); /* ปุ่มผู้ลงข้อสอบ */
        }
    </style>
</head>

<body>
    <div class="form-container">
        <img src="images/logo.png" alt="logo" class="logo"><br>
        <label for="ID_Emp">ID_Emp</label>
        <input type="text" name="ID_Emp" id="ID_Emp"><br>
        <label for="password">รหัสเข้าห้องสอบ</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit" onclick="showData()">เข้าสู่ระบบ</button>
    </div>

    <script>
        function showData() {
            var ID_Emp = $("#ID_Emp").val();
            var password = $("#password").val();
            var formData = new FormData();

            formData.append("ID_Emp", ID_Emp);
            formData.append("password", password);

            $.ajax({
                url: 'test.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    var res = JSON.parse(response);
                    console.log(res.ID_Emp);
                    console.log(res.pass);
                }
            });
        }
    </script>
</body>

</html>
