<x-layout.app title="داشبورد ادمین" style="admin-dashboard">
<div class="container">
<div class="admin-dashboard">
    <h1 class="admin-title">داشبورد مدیریت</h1>

    <div class="admin-grid">
        <a href="{{ route('admin.blogsPage') }}" class="admin-card">
            <h2>📝 بلاگ‌ها</h2>
            <p>مدیریت و ویرایش پست‌های بلاگ</p>
        </a>

        <a href="{{ route('admin.blogCommentPage') }}" class="admin-card">
            <h2>💬 کامنت‌های بلاگ</h2>
            <p>مدیریت نظرات نوشته شده در بلاگ‌ها</p>
        </a>

        <a href="{{ route('admin.questionPage') }}" class="admin-card">
            <h2>❓ سوالات انجمن</h2>
            <p>بررسی و مدیریت سوال‌های انجمن</p>
        </a>

        <a href="{{ route('admin.questionCommentPage') }}" class="admin-card">
            <h2>🧠   کامنت های انجمن</h2>
            <p>مدیریت پاسخ‌ها و ریپلای‌های انجمن</p>
        </a>


        
        {{-- <a href="{{ route('admin.suspendedPage') }}" class="admin-card">
            <h2>⏳ محتوای منتظر تایید</h2>
            <p>بررسی و تایید بلاگ‌ها، سوالات و نظرات قبل از انتشار</p>
        </a> --}}

        <a href="{{ route('admin.usersPage') }}" class="admin-card">
            <h2>👥 مدیریت کاربران</h2>
            <p>مشاهده، ساسپند یا حذف کاربران</p>
        </a>

        {{-- <a href="{{ route('admin.tagsPage') }}" class="admin-card">
            <h2>🏷️ تگ‌ها</h2>
            <p>مدیریت تگ‌های موجود</p>
        </a>

        <a href="{{ route('admin.reportsPage') }}" class="admin-card">
            <h2>🚩 گزارش‌ها</h2>
            <p>بررسی محتوای گزارش‌شده توسط کاربران</p>
        </a> --}}

    </div>
</div>
</div>
</x-layout.app>




