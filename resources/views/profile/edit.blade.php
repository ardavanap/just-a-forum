<x-layout.app title="ادیت پروفایل" style="edit-profile">

<div class="edit-profile-container">
    <h2 class="title">ویرایش حساب کاربری</h2>

    <form action="/profile/edit" method="POST" enctype="multipart/form-data" class="edit-profile-form">
        @csrf
        @method('PATCH')

        <!-- تصویر پروفایل -->
        <div class="form-group">
            <label for="avatar">عکس پروفایل</label>
            <input type="file" name="avatar" id="avatar">
            @if(auth()->user()->avatar)
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="avatar-preview" alt="avatar">
            @endif
        </div>

        <!-- نام -->
        <div class="form-group">
            <label for="name">نام</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->nickname) }}" required>
        </div>

        <!-- ایمیل -->
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <!-- بایو -->
        <div class="form-group">
            <label for="bio">بیوگرافی</label>
            <textarea name="description" id="bio" rows="3">{{ old('description', auth()->user()->description) }}</textarea>
        </div>

        <!-- تگ‌های مورد علاقه -->
        {{-- <div class="form-group">
            <label for="tags">تگ‌های مورد علاقه (با کاما جدا کن)</label>
            <input type="text" name="tags" id="tags" value="{{ old('tags', auth()->user()->tags) }}">
        </div> --}}

        <button type="submit" class="submit-btn">ذخیره تغییرات</button>
    </form>
</div>

</x-layout.app>>
