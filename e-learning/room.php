<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROOM</title>
</head>
<style>

.sidebar { /*แถบเมนู*/
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#b3b6b7; /* สีพื้นหลังแถบเมนู */
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color:black;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute; /*กำหนดปุ่ม x ไว้มุมขวา*/
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;  /*ขนาดของตัวอักษรในเมนูปรับให้เหมาะสมกับหน้าจอ*/
  cursor: pointer;
  background-color: #818181;
  color: white; /*สีแถบสามขีด*/
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
</style>
<body>
    <img src="images/logo.png" alt="โลโก้" class="logo">
    <div id="mySidebar" class="sidebar">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
        <a href="#">HOME</a>
        <a href="quiz.php">สร้างห้องสอบ</a>
        <a href="#">สร้างข้อสอบ</a>
        <a href="#">ข้อมูลทั้งหมด</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ </button>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

</body>

</html>