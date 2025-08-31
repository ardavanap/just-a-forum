<x-layout.app title="مدیریت سوالات انجمن" style="admin-forum-questions"> 
  <div class="admin-forum-container">
    <h1 class="admin-forum-title">مدیریت سوالات انجمن</h1>

    <div class="admin-forum-table">
      <div class="admin-forum-header">
        <span>کاربر</span>
        <span>عنوان سوال</span>
        <span>تاریخ</span>
        <span>وضعیت</span>
        <span>عملیات</span>
      </div>
      
      @foreach ($questions as $question)
      <div class="admin-forum-row">
        <span class="forum-user">{{ $question->user->nickname }}</span>
        <span class="forum-title"> {{ $question->title }} </span>
        <span class="forum-date">{{ $question->updated_at }}</span>
        <span class="forum-status">منتشر شده</span>
        <div class="forum-actions">
          <form method="GET" action='/question/{{ $question->id }}/edit'>
            <button class="edit-btn">ویرایش</button>
            @csrf
          </form>
          <form method="POST" action='/admin/question/{{ $question->id }}/delete'>
            <button class="delete-btn">حذف</button>
            @csrf
          </form>
        </div>
      </div>
      @endforeach
      {{ $questions->links() }}

      </div>

    </div>
  </div>
</x-layout.app>