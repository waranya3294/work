<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <img src="images/logo.png" alt="logo"><br>
    <label for="ID_Emp">ID_Emp</label>
    <input type="text" name="ID_Emp" id="ID_Emp"><br>
    <label for="password">password</label>
    <input type="password" name="password" id="password"><br>
    <!-- <input type="hidden" name="" id="user_type" value="user"> -->
    <!-- <button type="submit" onclick="showData()">เข้าสู่ระบบ</button> -->
    <button type="submit" onclick="showData()">เข้าสู่ระบบ</button>
    <button onclick="window.location.href='homepage.php'">ผู้ลงข้อสอบ</button>

    <script>
        function showData(){

            var ID_Emp = $("#ID_Emp").val();
            var password = $("#password").val();
            var formData = new FormData();

            formData.append("ID_Emp", ID_Emp);
            formData.append("password", password);
            


            // console.log(ID_Emp);
            $.ajax({
                url: 'test.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false, 
                success: function (response) {
                    var res = JSON.parse(response);
                    // 
                    console.log(res.ID_Emp);
                    console.log(res.pass);

                    // console.log("ข้อความ: " + res.user_type);

                }

            });
        }

    </script>

</html>