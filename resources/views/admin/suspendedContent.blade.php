<x-layout.app title="محتوای ساسپند شده" style="admin-pending-content">
<div class="admin-dashboard">
    <h1 class="admin-title">محتوای در انتظار تایید</h1>

    <div class="pending-section">
        <h2>📝 بلاگ‌ها</h2>

            <div class="pending-item">
                <p><strong></strong> توسط </p>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="btn-approve">تایید</button>
                </form>
            </div>


        <h2>💬 کامنت‌های بلاگ</h2>

            <div class="pending-item">
                <p>"سیبشسیبس" روی پست سبشیبسشیب</p>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="btn-approve">تایید</button>
                </form>
            </div>


        <h2>❓ سوال‌های انجمن</h2>

            <div class="pending-item">
                <p><strong>(اسم سوال)</strong> توسط ممد</p>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="btn-approve">تایید</button>
                </form>
            </div>


        <h2>💬 پاسخ‌ها / کامنت‌های انجمن</h2>

            <div class="pending-item">
                <p>"(متن جواب)" در پاسخ به "(تایتل جواب)"</p>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="btn-approve">تایید</button>
                </form>
            </div>

    </div>
</div>
</x-layout.app>

