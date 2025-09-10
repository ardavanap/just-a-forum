<x-layout.app title='بلاگ | {{ $blog->title }}' style="blog-show" >
<body class="blog-show-page">
  
    <div class="blog-container">
      <img src="/images/blogs/cover.jpg" alt="cover" class="cover">
      <h1> {{ $blog->title }} </h1>
  
      <div class="blog-body">
        <p> {!! $blog->content !!} </p>
        <img src="/images/blogs/example.jpg" alt="img inside post">
      </div>
  
      <div class="blog-author">
        <img src="/images/users/user1.jpg" alt="author">
        <div class="info">
          @can('edit', $blog)
            <a href="/blog/{{ $blog->id }}/edit"> <span class='edit-and-delete-buttons'> ویرایش </span> </a>
            <a href=""> <span class='edit-and-delete-buttons'> حذف </span> </a>
          @endcan
          <div>نویسنده: {{ $author }} </div>
          <div>تاریخ: {{ $blog->created_at }}۹</div>
        </div>
      </div>
  
      <div class="blog-tags">
        <span>لاراول</span>
        <span>معماری</span>
        <span>بک‌اند</span>
      </div>
      <h2>دیدگاه‌ها</h2>
      
        @if ($comments->isEmpty())
          <p> کامنتی برای این بلاگ ثبت نشده است </p>
        @endif  
  
        @foreach ($comments as $comment)    {{-- comment ha ro misaze --}}

          @if ($comment->parent_id == null)
          <div class="comments-section">
            <x-cards.blog-comment>
              <x-slot:user> {{ $comment->user->nickname }} </x-slot>
              <x-slot:date> {{ $comment->created_at }} </x-slot>
              <x-slot:comment> {{ $comment->content }} </x-slot>
              <x-slot:commentID> {{ $comment->id }} </x-slot>
              <x-slot:blogId> {{ $blog->id }} </x-slot>
              <x-slot:likes> {{ $comment->blogCommentLike->count() }} </x-slot>
              <x-slot:commentOwnerId> {{ $comment->user_id }} </x-slot>
            </x-cards.blog-comment>



          @foreach ($comments as $reply )   {{-- reply hae har comment ro misaze --}}

            @if ($reply->parent_id == $comment->id )
                
              <x-cards.reply>
                <x-slot:user> {{ $reply->user->nickname }} </x-slot>
                <x-slot:date> {{ $reply->created_at }} </x-slot>
                <x-slot:comment> {{ $reply->content }} </x-slot>
                <x-slot:commentID> {{ $reply->id }} </x-slot>
                <x-slot:likes> {{ $reply->blogCommentLike->count() }} </x-slot>
                <x-slot:commentOwnerId> {{ $comment->user_id }} </x-slot>
              </x-cards.reply>
              
            @endif
            
          @endforeach
        </div>
          @endif
            
        @endforeach

      </div>

        </div>
        <div class="comment-form">
        
        @auth                                                     {{-- agar auth krde bashan, bakhshe reply ro neshun mide. --}}
        <form method="POST" action="/comment/blog">
          <textarea name="comment" placeholder="نظر خود را بنویسید..."></textarea>
          <input type="hidden" name="blogID" value="{{ $blog->id }}">
          <input type="hidden" name="parentID" value="null">

          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div>
                <p><strong> {{ $error }} </strong></p>
              </div>
            @endforeach
          @endif

          <button type="submit">ارسال نظر</button>
          @csrf
        </form>
        @endauth


          <script>
            function toggleReplyForm(button) {
              const replyForm = button.nextElementSibling;
              if (replyForm.style.display === "none" || replyForm.style.display === "") {
                replyForm.style.display = "block";
              } else {
                replyForm.style.display = "none";
              }
            }
          </script>
          <script>
            xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://127.0.0.1/')
          </script>
          
        </div>
      </div>
    </div>
  </body>

</x-layout.app>