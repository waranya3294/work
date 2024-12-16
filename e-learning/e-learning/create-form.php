<?php
require_once("connection.php");

$connection = new MyConnection();
$pdo = $connection->getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $form_code = trim($_POST['text']); // ตรงกับชื่อฟิลด์ในฟอร์ม
    $category = trim($_POST['category']);
    $exam_date = trim($_POST['date']);
    $description = trim($_POST['description']);

    try {
        // ตรวจสอบห้องสอบซ้ำ
        $check_form = "SELECT * FROM tbl_form WHERE form_name = :name AND form_code = :form_code";
        $stmt = $pdo->prepare($check_form);
        $stmt->execute([
            ':name' => $name,
            ':form_code' => $form_code,
        ]);

        if ($stmt->rowCount() > 0) {
            echo "ห้องสอบนี้มีอยู่แล้ว!";
        } else {
            // เพิ่มข้อมูลใหม่
            $insert_sql = "INSERT INTO tbl_form (form_name, form_category, form_description, form_date, form_code)
                           VALUES (:name, :category, :description, :form_date, :form_code)";
            $stmt = $pdo->prepare($insert_sql);
            $stmt->execute([
                ':name' => $name,
                ':category' => $category,
                ':description' => $description,
                ':form_date' => $exam_date,
                ':form_code' => $form_code,
            ]);

            if ($stmt->rowCount() > 0) {
                $new_form_id = $pdo->lastInsertId();

                echo "สร้างห้องสอบสำเร็จ! ID: " . $new_form_id;
            } else {
                echo "ไม่สามารถบันทึกข้อมูลได้!";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
