<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | منصة المزارعين</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh; 
            background: url('pic.jpg') no-repeat center center fixed; 
            background-size: cover; 
            font-family: 'Cairo', sans-serif;

           
            display: flex;
            justify-content: center; 
            align-items: center;
            text-align: center;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #fff;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .login-container {
            background: linear-gradient(to right, rgba(76, 175, 80, 0.8), rgba(129, 199, 132, 0.8));
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: scale(0.95);
            animation: scaleUp 0.5s forwards;
            transition: background-color 0.3s ease;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #fff;
            font-size: 28px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* إضافة ظل للنص لتحسين وضوحه */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            color: #fff;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            margin-top: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            background: #fff;
            color: #333;
        }
        .form-group input[type="submit"] {
            background: #ff9800;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background: #ff5722;
        }
        .text-center {
            margin-top: 20px;
            font-size: 14px;
        }
        .text-center a {
            color: #ff9800;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }

        @keyframes scaleUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .forgot-password-container {
            display: none;
            background: linear-gradient(to right, rgba(76, 175, 80, 0.8), rgba(129, 199, 132, 0.8));
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .forgot-password-container.active {
            display: block;
        }
    </style>
</head>
<body>

    
    
    <div class="login-container" id="loginContainer">
        <h2>تسجيل الدخول</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="تسجيل الدخول">
            </div>
        </form>
        <div class="text-center">
            <p><a href="#" id="forgotPasswordLink">نسيت كلمة المرور؟</a></p>
            <p>ليس لديك حساب؟ <a href="register.php">إنشاء حساب جديد</a></p>
        </div>
    </div>

    
    <div class="forgot-password-container" id="forgotPasswordContainer">
        <h2>استعادة كلمة المرور</h2>
        <form id="forgotPasswordForm">
            <div class="form-group">
                <label for="phoneNumber">رقم الهاتف</label>
                <input type="text" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <input type="submit" value="إرسال الرمز">
            </div>
        </form>
        <div class="text-center">
            <p><a href="#" id="backToLoginLink">العودة إلى تسجيل الدخول</a></p>
        </div>
    </div>

    <script>
       
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();  

          
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

           
            const storedUsername = localStorage.getItem(username);

            if (storedUsername && storedUsername === password) {
                alert('تم تسجيل الدخول بنجاح!');
                window.location.href = "index.html"; 
            } else {
                alert('اسم المستخدم أو كلمة المرور غير صحيحة.');
            }
        });

       
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('forgotPasswordContainer').classList.add('active');
        });

       
        document.getElementById('backToLoginLink').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('forgotPasswordContainer').classList.remove('active');
            document.getElementById('loginContainer').style.display = 'block';
        });

      
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault(); 
           
            const phoneNumber = document.getElementById('phoneNumber').value;

           
            alert(`تم إرسال رمز استعادة الحساب إلى الرقم: ${phoneNumber}`);
        });

         
        const loginContainer = document.getElementById('loginContainer');
        
        loginContainer.addEventListener('mouseover', function() {
            loginContainer.style.backgroundColor = 'rgba(76, 175, 80, 0.7)'; 
        });
        
        loginContainer.addEventListener('mouseout', function() {
            loginContainer.style.backgroundColor = ''; 
        });
    </script>

</body>
</html>