<header>
    <div class="logo">JustAForum</div>
    <nav>
      <a href="{{ route("home") }}">خانه</a>
      @if (auth()->user()?->roll_id == 1)
      <a href="{{ route("admin.dashboard") }}">داشبورد ادمین</a>
      @endif
      <a href="{{ route("topic.index") }}">انجمن</a>
      <a href="{{ route("blog.index") }}">بلاگ</a>
      @auth
        
        <a href="/logout">خروج</a>
        <a href="/profile">
          <img src="/profile1.svg" width="28" height="28"> 
        </a>
      @endauth
      @guest
        <a href="{{ route("login") }}">ورود</a>
        <a href="{{ route("signup") }}" class="signup">ثبت‌نام</a>
      @endguest

      
    </nav>
</header>