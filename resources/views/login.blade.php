<x-layout.app title="ورود" style="login">
  <div class="login-page">
    <form method="POST" action="/login" class="login-form-container">
      @csrf
      <h2>ورود</h2>
  
      <label for="username">ایمیل</label>
      <input type="text" id="username" name="email" required placeholder="sample@example.com">
  
      <label for="password">رمز عبور</label>
      <input type="password" id="password" name="password" required placeholder="********">
  
      <button type="submit" class="login-btn">ورود</button>
  
      <div class="extra-links">
        <a href="/forgot-password">رمز عبور را فراموش کرده‌اید؟</a>
      </div>

        {{-- neshun dadane validation error ha --}}
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div>
            <p><strong> {{ $error }} </strong></p>
          </div>
        @endforeach
      @endif

    </form>
  </div>
</x-layout.app>