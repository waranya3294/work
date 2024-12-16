<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มหลายตัวเลือก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f0fa;
            margin: 20px;
        }

        .form-container {
            background-color: #ffffff;
            max-width: 700px;
            margin: auto;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title,
        .form-description {
            margin-bottom: 15px;
        }

        .question-box {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9ff;
            margin-bottom: 15px;
        }

        .add-option {
            color: #1a73e8;
            cursor: pointer;
            font-size: 14px;
        }

        .add-option:hover {
            text-decoration: underline;
        }

        .required-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        button {
            background-color: #673ab7;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
        }

        button:hover {
            background-color: #512da8;
        }

        .icon {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <!-- หัวฟอร์ม -->
        <h1 class="form-title" contenteditable="true">ฟอร์มไม่มีชื่อ</h1>
        <p class="form-description" contenteditable="true">คำอธิบายแบบฟอร์ม</p>

        <!-- กล่องคำถาม -->
        <div class="question-box">
            <div class="d-flex justify-content-between align-items-center">
                <input type="text" class="form-control mb-2" placeholder="คำถามไม่ระบุชื่อ" id="question-text">
                <div>
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        หลายตัวเลือก
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">radio</a></li>
                        <li><a class="dropdown-item" href="#">checkbox</a></li>
                        <li><a class="dropdown-item" href="#">คำตอบสั้น</a></li>
                    </ul>
                </div>
            </div>

            <div id="options-container">
                <div class="d-flex align-items-center mb-2">
                    <input type="radio" disabled>
                    <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ 1">
                    <i class="bi bi-trash icon ms-2" onclick="deleteOption(this)"></i>
                </div>
            </div>

            <!-- เพิ่มตัวเลือก -->
            <div class="add-option" onclick="addOption()">เพิ่มตัวเลือก หรือ <b>เพิ่ม "อื่นๆ"</b></div>
        </div>

        <!-- ปุ่มจัดการฟอร์ม -->
        <div class="action-buttons">
            <button onclick="saveForm()">บันทึก</button>
            <button class="btn btn-outline-danger">ลบ</button>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // เพิ่มตัวเลือกใหม่
        function addOption() {
            const optionsContainer = document.getElementById('options-container');
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
            optionDiv.innerHTML = `
                <input type="radio" disabled>
                <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ ${optionsContainer.children.length + 1}">
                <i class="bi bi-trash icon ms-2" onclick="deleteOption(this)"></i>
            `;
            optionsContainer.appendChild(optionDiv);
        }

        // ลบตัวเลือก
        function deleteOption(element) {
            element.parentElement.remove();
        }

        // บันทึกฟอร์ม
        function saveForm() {
            const formTitle = document.querySelector('.form-title').innerText;
            const formDescription = document.querySelector('.form-description').innerText;
            const question = document.getElementById('question-text').value;

            alert(`ฟอร์ม: ${formTitle}\nคำอธิบาย: ${formDescription}\nคำถาม: ${question}\nบันทึกสำเร็จ`);
        }
    </script>
</body>

</html>


.....................................
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มหลายตัวเลือก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f0fa;
            margin: 20px;
        }

        .form-container {
            background-color: #ffffff;
            max-width: 700px;
            margin: auto;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title,
        .form-description {
            margin-bottom: 15px;
        }

        .question-box {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9ff;
            margin-bottom: 15px;
            position: relative;
        }

        .add-option {
            color: #1a73e8;
            cursor: pointer;
            font-size: 14px;
        }

        .add-option:hover {
            text-decoration: underline;
        }

        .icon {
            cursor: pointer;
        }

        .image-upload {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .image-upload input {
            display: none;
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <!-- หัวฟอร์ม -->
        <h1 class="form-title" contenteditable="true">ฟอร์มไม่มีชื่อ</h1>
        <p class="form-description" contenteditable="true">คำอธิบายแบบฟอร์ม</p>

        <!-- กล่องคำถาม -->
        <div class="question-box" id="question-1">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <input type="text" class="form-control" placeholder="คำถามไม่ระบุชื่อ" id="question-text">
                <div>
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        หลายตัวเลือก
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">radio</a></li>
                        <li><a class="dropdown-item" href="#">checkbox</a></li>
                        <li><a class="dropdown-item" href="#">คำตอบสั้น</a></li>
                    </ul>
                </div>
            </div>

            <!-- ตัวเลือก -->
            <div id="options-container">
                <div class="d-flex align-items-center mb-2">
                    <input type="radio" disabled>
                    <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ 1">
                    <i class="bi bi-trash icon ms-2" onclick="deleteOption(this)"></i>
                </div>
            </div>

            <!-- อัปโหลดรูปภาพ -->
            <div class="image-upload">
                <label for="image-input" class="btn btn-outline-primary">
                    <i class="bi bi-image"></i> เพิ่มรูปภาพ
                </label>
                <input type="file" id="image-input" accept="image/*" onchange="previewImage(event)">
                <img id="image-preview" class="image-preview" style="display:none;">
            </div>

            <!-- ปุ่มคัดลอก -->
            <div class="mt-2">
                <button class="btn btn-outline-secondary" onclick="duplicateQuestion(this)">
                    <i class="bi bi-files"></i> คัดลอกคำถาม
                </button>
            </div>
        </div>

        <!-- ปุ่มเพิ่มคำถาม -->
        <div class="mt-3">
            <button class="btn btn-success" onclick="addNewQuestion()">
                <i class="bi bi-plus-circle"></i> เพิ่มคำถามใหม่
            </button>
        </div>
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // เพิ่มตัวเลือกใหม่
        function addOption() {
            const optionsContainer = document.getElementById('options-container');
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
            optionDiv.innerHTML = `
                <input type="radio" disabled>
                <input type="text" class="form-control ms-2" placeholder="ตัวเลือกที่ ${optionsContainer.children.length + 1}">
                <i class="bi bi-trash icon ms-2" onclick="deleteOption(this)"></i>
            `;
            optionsContainer.appendChild(optionDiv);
        }

        // ลบตัวเลือก
        function deleteOption(element) {
            element.parentElement.remove();
        }

        // พรีวิวรูปภาพ
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        // คัดลอกคำถาม
        function duplicateQuestion(button) {
            const questionBox = button.closest('.question-box');
            const clone = questionBox.cloneNode(true);
            questionBox.parentElement.insertBefore(clone, questionBox.nextSibling);
        }

        // เพิ่มคำถามใหม่
        function addNewQuestion() {
            const formContainer = document.querySelector('.form-container');
            const newQuestion = document.querySelector('.question-box').cloneNode(true);
            formContainer.insertBefore(newQuestion, formContainer.lastElementChild);
        }
    </script>
</body>

</html>
