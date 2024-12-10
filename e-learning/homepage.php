<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

  <img src="images/logo.png" alt="โลโก้" class="logo"><br>
  <label for="department">แผนก:</label><br>
  <input type="text" id="department" name="department"><br>
  <label for="exam_code">รหัสเข้าห้องสอบ:</label><br>

  <input type="text" id="exam_code" name="exam_code" ><br>

  <button type="submit" onclick="showData()">เข้าสู่ระบบ</button>

  <script>
    function showData() {
      // var dept_1 = document.getElementById("department");

      var dept = $("#department").val();
      var exam_code = $("#exam_code").val();
      var formData = new FormData(); //ใช้สำหรับสร้างและจัดการข้อมูล

      formData.append("dept",dept);
      formData.append("exam_code",exam_code);

      // ใช้ในการส่งค่า
      $.ajax({
        type: 'POST', 
        url: 'auth.php',  //ส่งค่าไปยัง auth.ph    
        data: formData,
        contentType: false,  //กำหนดประเภทของข้อมูล
        processData: false,  //ป้องกันไม่ให้ jQuery แปลงข้อมูล 
        success: function(response){
          var res = JSON.parse(response);
          Swal.fire({
            icon: res.icon,
            title: res.title,
            text: res.text,
            confirmButtonColor: res.btnColor
          });
        },
    });
    };
</script>

</body>

</html>