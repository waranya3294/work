<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(images/1.jpg);
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;

    }

    .container {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
      text-align:center;
      width: 100%;
      max-width: 400px;
    }

    .container img {
      width: 300px;
    }

    .container label {
      display: block;
      font-size: 14px;
      margin: 10px 0 5px;

    }

    .container input {
      width: 50%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .container button {
      width: 50%;
      padding: 10px;
      background-color:green;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      margin-bottom: 5px;
    }
  </style>
</head>

<body>

  <div class="container ">
    <img src="images/logo.png" alt="logo" >
   
      <label for="department">แผนก:</label>
      <input type="text" class="" id="department" name="department">
      <label for="exam_code">รหัสผ่าน:</label>
      <input type="text" id="exam_code" name="exam_code">
      <button class="btn " name="login" type="submit" onclick="showData()">เข้าสู่ระบบ</button>

    <script>
      function showData() {
        // var dept_1 = document.getElementById("department");

        var dept = $("#department").val();
        var exam_code = $("#exam_code").val();
        var formData = new FormData(); //ใช้สำหรับสร้างและจัดการข้อมูล

        formData.append("dept", dept);
        formData.append("exam_code", exam_code);

        // ใช้ในการส่งค่า
        $.ajax({
          type: 'POST',
          url: 'auth.php',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            var res = JSON.parse(response);
            Swal.fire({
              icon: res.icon,
              title: res.title,
              text: res.text,
              confirmButtonColor: res.btnColor

            }).then((result) => {
              if (res.icon === 'success') {
                // ถ้าเข้าสู่ระบบสำเร็จ จะเปลี่ยนหน้าไปที่ room.php
                window.location.href = 'room.php';
              }
            });
          },
        });
      }
    </script>

</body>

</html>