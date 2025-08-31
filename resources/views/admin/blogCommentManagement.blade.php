<x-layout.app title="مدیریت کامنت بلاگ" style="admin-blog-comments">
  <div class="admin-comments-container">
    <h2 class="admin-comments-title">مدیریت کامنت‌های بلاگ</h2>

    <div class="admin-comments-table">
      <div class="admin-comments-header">
        <div>متن کامنت</div>
        <div>نویسنده</div>
        <div>تاریخ</div>
        <div>اقدامات</div>
      </div>

      @foreach ($comments as $comment)
      <div class="admin-comments-row">
        <div>{{ $comment->content }}</div>
        <div> {{ $comment->user->nickname }} </div>
        <div>{{ $comment->created_at }}</div>
      <form method="POST" action="/admin/blog-comment/{{ $comment->id }}/delete">  
        <div class="comment-actions">
          <button class="delete-btn" type='submit'>حذف</button>
          @csrf
        </div>
      </form>
      </div>
      @endforeach

    </div>
    {{ $comments->links() }}
  </div>
</x-layout.app>