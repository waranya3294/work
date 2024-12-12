<!DOCTYPE html>
<html lang="th">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สร้างห้องสอบ</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      position: relative;
    }

    /* กำหนดให้แถบเมนูด้านข้าง */
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

    /* เมนูในแถบด้านข้าง */
    .menu {
      list-style-type: none;
      padding: 20px 0;
    }

    .menu li {
      padding: 15px;
      color: white;
      text-align: center;
    }

    .menu li:hover {
      background-color: #836953;
    }

    /* ปุ่มย่อแถบเมนู */
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

    /* กำหนดขนาดพื้นที่หลัก */
    .main-content {
      margin-left: 250px;
      /* เมื่อแถบเมนูปกติ ขนาด margin-left คือ 250px */
      padding: 20px;
      flex-grow: 1;
      transition: margin-left 0.3s ease;
      /* เพิ่มการเปลี่ยนแปลง margin-left เมื่อแถบเมนูย่อ */
    }

    /* เมนูที่ย่อ */
    .sidebar.collapsed {
      width: 80px;
      /* เมื่อแถบเมนูย่อ ขนาดจะเป็น 80px */
    }

    .sidebar.collapsed .menu li {
      font-size: 12px;
    }

    .sidebar.collapsed .logo img {
      max-width: 50px;
    }

    /* เมื่อแถบเมนูย่อแล้ว ให้แสดงเนื้อหาหลักเต็มหน้าจอ */
    .sidebar.collapsed+.main-content {
      margin-left: 80px;
      /* เมื่อแถบเมนูย่อ ให้ margin-left ของเนื้อหาหลักเป็น 80px */
    }

    /* ปุ่มสร้างห้องสอบ */
    button {
      padding: 15px 30px;
      font-size: 18px;
      color: white;
      background-color: #007bff;
      border: none; /* ไม่ให้มีขอบ */
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 20px;
    }

    button:hover {
      background-color: #0056b3;
      /* สีพื้นหลังเมื่อ hover */
    }

    .user-info img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .user-info .user-details {
      font-size: 14px;
    }

    .logo img {
      width: 250px;
      /* กำหนดความกว้าง */
      height: 100px;
      /* กำหนดความสูง */
    }
  </style>
</head>

<body>
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <img src="images/logo.png" alt="โลโก้" class="logo">
    </div>
    <ul class="menu">
      <li>HOME</li>
      <li>สร้างข้อสอบ</li>
      <li>ข้อสอบของฉัน</li>
      <li>ข้อมูลทั้งหมด</li>
    </ul>
    <div class="toggle-btn" onclick="toggleSidebar()">&#x2190;</div>
  </div>

  <div class="main-content">
    <button onclick="window.location.href='exam_room.php'">สร้างห้องสอบ</button>
  </div>

  <script>
    // ฟังก์ชั่นย่อและขยายแถบเมนู
    function toggleSidebar() {
      var sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');

      var toggleBtn = document.querySelector('.toggle-btn');
      if (sidebar.classList.contains('collapsed')) {
        toggleBtn.innerHTML = '&#x2192;'; // เปลี่ยนเป็นลูกศรชี้ขวา
      } else {
        toggleBtn.innerHTML = '&#x2190;'; // เปลี่ยนเป็นลูกศรชี้ซ้าย
      }
    }
  </script>
  
</body>

</html>
