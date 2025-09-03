<x-layout.app title="پروفایل" style="profile">
<body class="profile-page">
  <div class="profile-header">
    <img src="/images/users/user1.jpg" alt="User Profile Picture">
    <div class="profile-info">
      <h2>{{ $user->nickname }}</h2>
      
      @if ($user->description)
        <p>{{ $user->description }}</p>
      @else
        <p>sample bio</p>
      @endif
      <a href="{{ route('profile.edit') }}" class="tag"> <strong> ادیت پروفایل </strong> </a>
 
    </div>
  </div>

  <div class="tags-section">
    <h3>تگ‌های مورد علاقه</h3>
    <div class="tags-list">
      @foreach ($user->tags as $tag)
        <span class="tag"> {{ $tag->title }} </span>
      @endforeach

      @if(auth()->id() == $user->id)
        <a href="{{ route('tag.edit') }}" class="tag"> <strong> + </strong> </a>
      @endif
      
    </div>
  </div>

  <div class="lists-section">
    <div class="list-container">
      <h3>سوالات</h3>
      @if ($questions->isNotEmpty())
        @foreach ($questions as $question )
          <div class="list-item" onclick="location.href='/question/{{ $question->id }}'"> {{$question->title}} </div>
        @endforeach
      @else
        <p> کاربر سوال ثبت شده ای ندارد. </p>
      @endif
    </div>

    <div class="list-container">
      <h3>بلاگ ها</h3>
      @if ($blogs->isNotEmpty())
        @foreach ($blogs as $blog)
          <div class="list-item" onclick="location.href='/blog/{{ $blog->id }}'"> {{ $blog->title }} </div>
        @endforeach
      @else
        <p> کاربر بلاگ ثبت شده ای ندارد. </p>
      @endif
    </div>
  </div>
</body>
</x-layout.app>