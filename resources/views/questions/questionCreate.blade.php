
<x-layout.app title='نوشتن سوال' style="ask-question">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
  <body class="ask-question-page">
  
    <form method="POST" action="/question" enctype="multipart/form-data" onsubmit="return submitForm()">
      @csrf
  
            <label for="fruits">موضوع سوال؛</label>
      <select id="topic" name="topic">
        @foreach($topics as $topic)
        <option value="{{ $topic->title }}">{{ $topic->title }}</option>
        @endforeach
      </select><br>

      <label for="title">عنوان سوال</label>
      <input type="text" id="title" name="title" required>
  

      <br>
      <label>متن سوال</label>
      <div id="editor"></div>
      <input type="hidden" name="body" id="bodyInput">
  
      <label for="image">آپلود عکس (اختیاری)</label>
      <input type="file" id="image" name="image" accept="image/*">
  
      <button type="submit" class="submit-btn">ارسال سوال</button>
    </form>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div>
        <p><strong> {{ $error }} </strong></p>
      </div>
    @endforeach
  @endif
  
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
      var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'متن سوال خود را اینجا بنویسید...',
        modules: {
          toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ list: 'ordered'}, { list: 'bullet' }],
            ['link', 'image'],
            ['clean']
          ]
        }
      });
  
      function submitForm() {
        var html = quill.root.innerHTML.trim();
        if(html === '<p><br></p>' || html === '') {
          alert('لطفا متن سوال را وارد کنید.');
          return false;
        }
        document.getElementById('bodyInput').value = html;
        return true;
      }
    </script>
  </body>
</x-layout.app>