<footer class="site-footer">
  <div class="footer-content">
    <p>© 2025 JustAForum. همه حقوق محفوظ است.</p>
    <nav class="footer-nav">
      <a href="{{ route('home') }}">خانه</a>
      <a href="/blog">بلاگ</a>
      <a href="/topics">موضوعات</a>
      @if (auth()->user())
      <a href="/logout">خروج</a>
      <a href="{{ route('profile') }}">پروفایل</a>
      @else
        <a href="{{ route('login.index') }}">ورود</a>
        <a href="{{ route('signup.index') }}">ثبت نام</a>
      @endif

    </nav>
  </div>
</footer>