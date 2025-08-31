<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ثبت‌نام - JustAForum</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #344966;
      color: #D9E6F1;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .register-box {
      background-color: #0D1821;
      padding: 2rem;
      border-radius: 12px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .register-box h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #B4CDED;
    }

    .form-group {
      margin-bottom: 1.3rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: #D9E6F1;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.7rem;
      border: none;
      border-radius: 8px;
      background-color: #344966;
      color: #D9E6F1;
      font-size: 1rem;
    }

    input::placeholder {
      color: #B4CDED;
    }

    .btn {
      width: 100%;
      background-color: #B4CDED;
      color: #0D1821;
      padding: 0.8rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 1rem;
    }

    .btn:hover {
      background-color: #D9E6F1;
    }

    .login-link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      color: #B4CDED;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .login-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .register-box {
        margin: 0 1rem;
      }
    }
  </style>
</head>
<body>

  <div class="register-box">
    <h2>ثبت‌نام در JustAForum</h2>
    <form action="/signup" method="POST">
    @csrf

      <div class="form-group">
        {{-- <label for="username">نام کاربری</label> --}}
        <input type="text" id="username" name="nickname" placeholder="نام کاربری" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        {{-- <label for="email">ایمیل</label> --}}
        <input type="email" id="email" name="email" placeholder="ایمیل" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        {{-- <label for="password">رمز عبور</label> --}}
        <input type="password" id="password" name="password" placeholder="رمز عبور">
      </div>

      <div class="form-group">
        {{-- <label for="password_confirmation">تکرار رمز عبور</label> --}}
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="تکرار رمز عبور">
      </div>

      <button type="submit" class="btn">ثبت‌نام</button>

      <a href="/login" class="login-link">حساب دارید؟ وارد شوید</a>
    </form>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div>
        <p><strong> {{ $error }} </strong></p>
      </div>
    @endforeach
  @endif
  
  </div>



</body>
</html>