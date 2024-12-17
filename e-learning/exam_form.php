<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มข้อสอบ</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="assets/lib/fontawsome/css/brands.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/solid.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/regular.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/css/fontawesome.css">


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .form-container {
            background-color: #fff;
            max-width: 700px;
            margin: 30px auto;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            display: block;
            width: 70%;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;

        }

        .form-description {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .custom-select {
            position: relative;
            width: 300px;
            font-family: Arial, sans-serif;
        }

        .selected-option {
            background-color: rgb(255, 255, 255);
            padding: 6px;
            border: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .select-items {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 100;
        }

        .select-item {
            padding: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .select-item .icon {
            margin-right: 10px;
        }

        .select-item:hover {
            background-color: rgb(255, 255, 255);
        }

        .select-hide {
            display: none;
        }


        .add-option {
            color: #1a73e8;
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .add-option:hover {
            text-decoration: underline;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-save {
            background-color: #28a745;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .side-menu {
            display: none; /* เริ่มต้นซ่อนเมนู */
            position: absolute;
            left: 50px; /* ปรับให้แสดงด้านข้าง */
            top: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            padding: 10px;
            width: 150px;
        }

        .side-menu a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 5px 0;
        }

        .side-menu a:hover {
            background-color: #f8f9fa;
        }

        /* ปรับให้ไอคอนมีขนาดใหญ่ขึ้น */
        .icon {
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            body {
                background-color: white;
                /* เปลี่ยนสีพื้นหลัง */
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <!-- <i class="bi bi-eye"></i> -->
        <!-- หัวฟอร์ม -->
        <h1 class="form-title" contenteditable="true" name="text">ชื่อเรื่อง</h1>
        <p class="form-description" contenteditable="true" name="text">คำอธิบาย/คำชี้แจง</p>

        <!-- กล่องคำถาม -->
        <div class="question-box" id="question-1">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <input type="text" class="form-control" placeholder="คำถาม" id="question-text" name="question">
                <div class="image-upload">
                    <label for="image-input" class="btn btn-outline-primary ms-3">
                        <i class="bi bi-image"></i>
                    </label>
                    <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="previewImage(event)">
                </div>

                <div class="custom-select ms-3">
                    <div class="selected-option rounded" id="selected-option" name="option">
                        <span class="icon"><i class="fas fa-edit"></i></span>
                        <span class="text">เลือกประเภท</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </div>
                    <div class="select-items select-hide" id="select-items">
                        <div class="select-item" data-value="paragraph">
                            <span class="icon"><i class="fas fa-align-left"></i></span> Paragraph
                        </div>
                        <div class="select-item" data-value="multiple">
                            <span class="icon"><i class="fas fa-list-ul"></i></span> Multiple options
                        </div>
                        <div class="select-item" data-value="checkbox">
                            <span class="icon"><i class="fas fa-check-square"></i></span> Checkbox
                        </div>
                    </div>
                </div>

            </div>

            <!-- ตัวเลือกคำตอบ -->
            <div id="options-container">
                <div class="d-flex align-items-center mb-2">
                    <input type="radio" disabled>
                    <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ 1">
                    <i class="bi bi-trash ms-2" onclick="deleteOption(this)"></i>
                </div>
            </div>

            <div class="add-option" onclick="addOption()">
                <i class="bi bi-plus-circle"></i> เพิ่มตัวเลือก
            </div>

            <!-- ปุ่มคัดลอกและเพิ่มคำถาม -->
            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-outline-primary" onclick="duplicateQuestion(this)">
                    <i class="bi bi-copy"></i>
                </button>
                <button class="btn btn-success " onclick="addNewQuestion()">
                    <i class="bi bi-plus-circle"></i> เพิ่มคำถาม
                </button>
            </div>
        </div>

        <!-- ปุ่มบันทึกและลบ -->
         
        <div class="action-buttons">
            <button class="btn btn-save" onclick="saveForm()">บันทึก</button>
            <button class="btn btn-delete" onclick="deleteQuestion()">ลบ</button>
            <div style="position: relative;">
                <i class="bi bi-three-dots-vertical icon" id="menu-icon"></i>

                <!-- ข้อความที่แสดงด้านข้าง -->
                <div class="side-menu" id="side-menu">
                    <a href="#">สลับลำดับของตัวเลือก</a>
                </div>
            </div>
        </div>


    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addOption() {
            const optionsContainer = document.getElementById('options-container');
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
            optionDiv.innerHTML = `
                <input type="radio" disabled>
                <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ ${optionsContainer.children.length + 1}">
                <i class="bi bi-trash text-danger ms-2" onclick="deleteOption(this)"></i>
            `;
            optionsContainer.appendChild(optionDiv);
        }

        // ลบตัวเลือก
        function deleteOption(element) {
            element.parentElement.remove();
        }
        // คัดลอกคำถาม
        function duplicateQuestion(button) {
            const questionBox = button.closest('.question-box');
            const clone = questionBox.cloneNode(true);
            questionBox.parentElement.insertBefore(clone, questionBox.nextSibling);
        }

        // ลบคำถาม
        function deleteQuestion(element) {
            const questionBox = element.closest('.question-box');

            if (confirm('ต้องการลบคำถามนี้?')) {
                questionBox.remove();
            }
        }

        // เพิ่มคำถาม
        function addNewQuestion() {
            const formContainer = document.querySelector('.form-container');
            const newQuestion = document.querySelector('.question-box').cloneNode(true);
            formContainer.insertBefore(newQuestion, formContainer.lastElementChild);
        }

        function saveForm() {
            alert('บันทึกแบบฟอร์มสำเร็จ!');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const formContainer = document.querySelector('.form-container');

            // เปิด/ปิด Dropdown
            formContainer.addEventListener('click', function(event) {
                if (event.target.closest('.selected-option')) {
                    const currentDropdown = event.target.closest('.custom-select').querySelector('.select-items');
                    currentDropdown.classList.toggle('select-hide');
                }

                // เลือกตัวเลือกจาก Dropdown
                if (event.target.closest('.select-item')) {
                    const item = event.target.closest('.select-item');
                    const currentSelect = item.closest('.custom-select');
                    const selectedOption = currentSelect.querySelector('.selected-option');
                    const selectedIcon = item.querySelector('.icon').innerHTML;
                    const selectedText = item.textContent.trim();

                    // อัปเดตค่าใน Selected Option
                    selectedOption.querySelector('.icon').innerHTML = selectedIcon;
                    selectedOption.querySelector('.text').textContent = selectedText;

                    // ปิด Dropdown
                    currentSelect.querySelector('.select-items').classList.add('select-hide');
                }
            });

            // เพิ่มคำถาม
            window.addNewQuestion = function() {
                const formContainer = document.querySelector('.form-container');
                const questionBox = document.querySelector('.question-box');
                const newQuestion = questionBox.cloneNode(true);
                formContainer.insertBefore(newQuestion, formContainer.lastElementChild);

                // ปิด Dropdown ทั้งหมดที่คัดลอกมาใหม่
                newQuestion.querySelectorAll('.select-items').forEach(dropdown => {
                    dropdown.classList.add('select-hide');
                });
            }
        });
    </script>
    <script>
    const menuIcon = document.getElementById('menu-icon');
    const sideMenu = document.getElementById('side-menu');

    // ฟังก์ชันเปิด/ปิดเมนู
    menuIcon.addEventListener('click', () => {
        if (sideMenu.style.display === 'none' || sideMenu.style.display === '') {
            sideMenu.style.display = 'block';
        } else {
            sideMenu.style.display = 'none';
        }
    });

    // ปิดเมนูเมื่อคลิกที่พื้นที่อื่น
    document.addEventListener('click', (event) => {
        if (!menuIcon.contains(event.target) && !sideMenu.contains(event.target)) {
            sideMenu.style.display = 'none';
        }
    });
</script>
</body>

</html>