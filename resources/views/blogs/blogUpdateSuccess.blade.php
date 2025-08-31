<x-layout.app title="ذخیره موفق" style="blog-success">
<div class="blog-success-container">
    <div class="success-box">
        <h2>✅ بلاگ با موفقیت آپدیت شد!</h2>
        <p>میتونی بلاگتو ببینی یا برگردی به صفحه اصلی.</p>

        <div class="buttons">
            <a href="{{ route('home') }}" class="btn back-btn">🏠 بازگشت به صفحه اصلی</a>
            <a href="/blog/{{ $blog->id }}" class="btn view-btn">👁️ دیدن بلاگ</a>
            @if (\App\Models\User::isAdmin())
                <a href="/admin/blogs/" class="btn view-btn">مدیریت بلاگ ها</a>
            @endif
        </div>
    </div>
</div>
</x-layout.app>

