<x-layout.app  title="مدیریت بلاگ" style="admin-blogs">
  <div class="admin-section">
    <h2>مدیریت بلاگ‌ها</h2>
    <table class="admin-table">
      <thead>
        <tr>
          <th>عنوان</th>
          <th>نویسنده</th>
          <th>تاریخ</th>
          <th>وضعیت</th>
          <th>عملیات</th>
        </tr>
      </thead>
      @foreach ($blogs as $blog)
      <tbody>
        <tr>
          <td>{{ $blog->title }}</td>
          <td>{{ $blog->user->nickname }}</td>
          <td>{{ $blog->updated_at }}</td>
          <td>منتشر شده</td>
          <td>
            <form method="GET" action="/blog/{{ $blog->id }}/edit">
              <button class="edit-btn" type="submit">ویرایش</button>
                @csrf
              </form>
  
              <form method="POST" action="/admin/blog/{{ $blog->id }}/delete">
                <button class="delete-btn" type="submit">حذف</button>
                @csrf
              </form>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    {{ $blogs->links() }}
  </div>
</x-layout.app>