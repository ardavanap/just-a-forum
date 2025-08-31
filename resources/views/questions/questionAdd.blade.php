<!DOCTYPE html><html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>پرسیدن سوال جدید - JustAForum</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #344966;
      color: #D9E6F1;
      padding: 2rem;
    }.container {
  max-width: 800px;
  margin: auto;
}

h1 {
  color: #B4CDED;
  margin-bottom: 2rem;
}

label {
  display: block;
  margin: 1rem 0 0.5rem;
  font-weight: bold;
}

input[type="text"], select {
  width: 100%;
  padding: 0.8rem;
  border-radius: 6px;
  border: none;
  font-size: 1rem;
}

.toolbar button {
  margin-left: 0.5rem;
  background: none;
  border: 1px solid #B4CDED;
  color: #B4CDED;
  padding: 0.3rem 0.6rem;
  border-radius: 4px;
  cursor: pointer;
}

.editor {
  background-color: #0D1821;
  padding: 1rem;
  border-radius: 8px;
  min-height: 200px;
  margin-top: 0.5rem;
  color: #D9E6F1;
}

.submit-btn {
  margin-top: 2rem;
  padding: 1rem 2rem;
  background-color: #B4CDED;
  color: #0D1821;
  border: none;
  font-size: 1.1rem;
  font-weight: bold;
  border-radius: 8px;
  cursor: pointer;
}

input[type="file"] {
  margin-top: 1rem;
  background-color: #0D1821;
  border-radius: 6px;
  padding: 0.6rem;
  color: #D9E6F1;
  width: 100%;
}

  </style>
</head>
<body>
  <div class="container">
    <h1>پرسیدن سوال جدید</h1>
    <form method="POST" action="/ask" enctype="multipart/form-data">
      <label for="title">عنوان سوال</label>
      <input type="text" id="title" name="title" required><label for="topic">موضوع</label>
  <select id="topic" name="topic" required>
    <option value="">انتخاب موضوع</option>
    <option value="programming">برنامه‌نویسی</option>
    <option value="security">امنیت</option>
    <option value="uiux">UI/UX</option>
    <option value="ai">هوش مصنوعی</option>
    <option value="mobile">موبایل</option>
  </select>

  <label>متن سوال</label>
  <div class="toolbar">
    <button type="button" onclick="formatText('bold')"><b>B</b></button>
    <button type="button" onclick="formatText('italic')"><i>I</i></button>
    <button type="button" onclick="formatText('underline')"><u>U</u></button>
    <button type="button" onclick="formatText('insertUnorderedList')">• لیست</button>
    <button type="button" onclick="formatText('insertOrderedList')">1. لیست</button>
    <button type="button" onclick="formatText('formatBlock','<pre>')">کد</button>
    <button type="button" onclick="document.getElementById('imageUpload').click()">📷 عکس</button>
  </div>
  <div class="editor" id="editor" contenteditable="true"></div>
  <input type="file" id="imageUpload" accept="image/*" style="display: none">

  <input type="hidden" name="body" id="body">
  <button type="submit" class="submit-btn">ارسال سوال</button>
</form>

  </div>  <script>
    function formatText(command, value = null) {
      document.execCommand(command, false, value);
    }

    document.getElementById('imageUpload').addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          img.style.maxWidth = '100%';
          img.style.margin = '1rem 0';
          document.getElementById('editor').appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });

    document.querySelector('form').addEventListener('submit', function (e) {
      document.getElementById('body').value = document.getElementById('editor').innerHTML;
    });
  </script></body>
</html>