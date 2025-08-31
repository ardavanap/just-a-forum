<x-layout.app title="مدیریت کاربران" style="admin-users"> 
  <div class="admin-users-container">
    <h1 class="admin-users-title">لیست کاربران</h1>

    <div class="admin-users-table">
      <div class="admin-users-header">
        <div>نام کاربری</div>
        <div>ایمیل</div>
        <div>وضعیت</div>
        <div>نقش</div>
        <div>عملیات</div>
      </div>


      @foreach ($users as $user)
        
      <div class="admin-users-row">
        <div>{{ $user->nickname }}</div>
        <div>{{ $user->email }}</div>

        @if ($user->suspended == 0)
          <div class="status-active">فعال</div>
          <div>{{ $user->roll->title }}</div>
          <div class="user-actions">
            <form method="POST" action='/admin/user/{{ $user->id }}/suspend-or-unsuspend'>
              @csrf
              <button class="suspend-btn" type="submit">ساسپند</button>
            </form>
            
        @else
          <div class="status-suspended">مسدود</div>
          <div>{{ $user->roll->title }}</div>
          <div class="user-actions">
            <form method="POST" action='/admin/user/{{ $user->id }}/suspend-or-unsuspend'>
              <button class="unsuspend-btn" type='submit'>رفع محدودیت</button>
              @csrf
            </form>
        @endif
        </div>
      </div>
      
      @endforeach


      {{ $users->links() }}
    </div>
    {{-- <script>
      async function suspendUser(id) {
    if (!confirm("آیا از ساسپند کردن این کاربر مطمئن هستید؟")) return;

    const res = await fetch(`/api/admin/user/${id}/suspend-or-unsuspend`, {
        method: "PATCH",
        headers: { "Content-Type": "application/json" },
    });

    if (res.ok) {
        alert("کاربر ساسپند شد");
    } else {
        alert("خطا در ساسپند کردن کاربر");
    }
}

// حذف کاربر
async function deleteUser(id) {
    if (!confirm("آیا از حذف این کاربر مطمئن هستید؟")) return;

    const res = await fetch(`/api/admin/user/${id}/destroy`, {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
    });

    if (res.ok) {
        alert("کاربر حذف شد");
    } else {
        alert("خطا در حذف کاربر");
    }
}
    </script> --}}
  </div>
</x-layout.app>