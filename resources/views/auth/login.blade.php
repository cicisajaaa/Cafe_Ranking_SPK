<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Cafe Rank</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f4f6f9;
    font-family:'Segoe UI',sans-serif;
}

.login-container{
    width:950px;
    max-width:95%;
    min-height:550px;
    border-radius:25px;
    overflow:hidden;
    display:flex;
    background:white;
    box-shadow:0 25px 60px rgba(0,0,0,.15);
    animation:fadeSlide 1s ease forwards;
}

@keyframes fadeSlide {
    0% {opacity:0; transform:translateX(50px);}
    100% {opacity:1; transform:translateX(0);}
}

.left-panel{
    width:50%;
    background:#f5f5f5;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:50px;
}

.left-panel .coffee-icon{
    font-size:120px;
    color:#1f2937;
    animation:iconBounce 1s ease infinite alternate;
}

@keyframes iconBounce {
    0% {transform:translateY(0);}
    100% {transform:translateY(-10px);}
}

.left-panel h3{
    margin-top:20px;
    font-weight:700;
}

.left-panel p{
    text-align:center;
    color:#555;
    margin-top:10px;
    line-height:1.5;
}

.right-panel{
    width:50%;
    background:#1f2937;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:60px;
    flex-direction:column;
}

.login-box{
    width:100%;
    max-width:350px;
    animation:fadeIn 1s ease forwards;
}

@keyframes fadeIn{
    0%{opacity:0; transform:translateX(20px);}
    100%{opacity:1; transform:translateX(0);}
}

.login-box h4{
    font-size:36px;
    font-weight:700;
    margin-bottom:10px;
}

.system-title{
    font-size:14px;
    color:#bbb;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:15px;
    transition:all .3s;
}

.input-group:hover .form-control,
.input-group:focus-within .form-control{
    border-color:#2563eb;
    box-shadow:0 0 8px rgba(37,99,235,.3);
}

.form-control{
    height:50px;
    background:#2b2b2b;
    border:1px solid #3b3b3b;
    color:white;
    border-radius:12px;
    padding-left:45px;
    transition:.3s;
}

.form-control::placeholder{
    color:#9ca3af;
}

.btn-login{
    width:100%;
    height:50px;
    border:none;
    border-radius:30px;
    background:#2563eb;
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-login:hover{
    background:#1d4ed8;
    transform:scale(1.03);
    box-shadow:0 8px 20px rgba(37,99,235,.3);
}

.footer-text{
    margin-top:20px;
    font-size:13px;
    color:#9ca3af;
    text-align:center;
}

@media(max-width:768px){
    .login-container{
        flex-direction:column;
    }
    .left-panel, .right-panel{
        width:100%;
    }
    .left-panel{
        min-height:250px;
    }
}
</style>
</head>
<body>

<div class="login-container">

    <div class="left-panel">
        <i class="bi bi-cup-hot-fill coffee-icon"></i>
        <h3>Cafe Rank</h3>
        <p>
            Sistem Pendukung Keputusan<br>
            Pemilihan Cafe Menggunakan<br>
            Metode TOPSIS
        </p>
    </div>

    <div class="right-panel">

        <div class="login-box">

            <h4>Welcome Back</h4>
            <div class="system-title">
                Silakan login untuk masuk ke sistem
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-light">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                </div>

                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-light">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                    <button type="button" class="btn btn-dark border-secondary" onclick="togglePassword()">
                        <i class="bi bi-eye-fill" id="eyeIcon"></i>
                    </button>
                </div>

                <button type="submit" id="loginBtn" class="btn btn-login mt-3">Login</button>
            </form>

            <div class="footer-text">
                © 2026 Cafe Rank - TOPSIS
            </div>

        </div>

    </div>

</div>

<script>
function togglePassword() {
    let password = document.getElementById("password");
    let icon = document.getElementById("eyeIcon");
    if(password.type === "password"){
        password.type = "text";
        icon.classList.remove("bi-eye-fill");
        icon.classList.add("bi-eye-slash-fill");
    } else {
        password.type = "password";
        icon.classList.remove("bi-eye-slash-fill");
        icon.classList.add("bi-eye-fill");
    }
}

document.querySelector("form").addEventListener("submit", function(){
    document.getElementById("loginBtn").innerHTML =
        '<span class="spinner-border spinner-border-sm"></span> Memproses...';
});
</script>

</body>
</html>