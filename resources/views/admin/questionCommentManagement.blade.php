<x-layout.app title="مدیریت کامنت سوالات" style="admin-forum-comments">
  <div class="admin-forum-comments-container">
    <h1 class="admin-forum-comments-title">کامنت‌های سوال‌های انجمن</h1>

    <div class="admin-forum-comments-table">
      <div class="admin-forum-comments-header">
        <div>کاربر</div>
        <div>متن کامنت</div>
        <div>تاریخ</div>
        <div>عملیات</div>
      </div>

      @foreach ($comments as $comment )
      <div class="admin-forum-comments-row">
        <div>{{ $comment->user->nickname }}</div>
        <div class="comment-preview">{{ $comment->content }}</div>
        <div>{{ $comment->created_at }}</div>
        <form method="POST" action='/admin/question-comment/{{ $comment->id }}/delete'>
        <div class="comment-actions">
          <button class="delete-btn">حذف</button>
          @csrf
        </div>
        </form>
      </div>
      @endforeach

    </div>
    {{ $comments->links() }}

  </div>
</x-layout.app>