<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="id">id</label>
<?php //คำสั่งเรียกใช้
try {
    //code...
    require_once("connection.php");
    $conn = new MyConnection();
    $pdo = $conn->getPdo();


    $selectdata = "SELECT u_id,u_name,u_surname,u_dept,datetime FROM tbl_user";
    $stmt = $pdo->prepare($selectdata);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $result_one = $result[1];

    //  echo "ID: " . $result['u_id'] . " Name: " . $result['u_name'] . " Surname: " . $result['u_surname'] . " Date: " . $result['datetime'];
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}
?>
<h1>User List</h1>

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>User</td>
            <td>Surname</td>
            <td>Dept</td>
            <td>Date</td>
        </tr>
    </thead>
    <?php foreach ($result as $row): ?>
        <tr>

            <td><?php echo $row['u_id'] ?></td>
            <td><?php echo $row['u_name'] ?></td>
            <td><?php echo $row['u_surname'] ?></td>
            <td><?php echo $row['u_dept'] ?></td>
            <td><?php echo $row['datetime'] ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>

</html>