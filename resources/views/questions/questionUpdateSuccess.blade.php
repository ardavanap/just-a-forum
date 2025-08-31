<x-layout.app title="ذخیره موفق" style="blog-success">
    <div class="blog-success-container">
        <div class="success-box">
            <h2>✅ سوال با موفقیت ثبت شد!</h2>
            <p>میتونی سوالت رو ببینی یا برگردی به صفحه اصلی.</p>
    
            <div class="buttons">
                <a href="{{ route('home') }}" class="btn back-btn">🏠 بازگشت به صفحه اصلی</a>
                <a href="/question/{{ $question->id }}" class="btn view-btn">👁️ دیدن سوال</a>
                @if (\App\Models\User::isAdmin())
                    <a href="/admin/questions/" class="btn view-btn">مدیریت سوال ها</a>
                @endif
            </div>
        </div>
    </div>
</x-layout.app>
    