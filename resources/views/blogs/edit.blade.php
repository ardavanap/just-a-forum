<x-layout.app title="ادیت بلاگ" style="blogCreate">
    <head>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
      </head>
      <body class="ask-question-page">
      
        <form method="POST" action="/blog/{{ $blog->id }}" enctype="multipart/form-data" onsubmit="return submitForm()">
          @csrf
          @method('PATCH')
          <label for="title">عنوان بلاگ</label>
          <input type="text" id="title" name="title" value="{{ $blog->title }}" required>
      
          <label>متن بلاگ</label>
          <div id="editor"></div>
          <input type="hidden" name="body" id="bodyInput">
      
          <label for="image">آپلود عکس (اختیاری)</label>
          <input type="file" id="image" name="image" accept="image/*">
      
          <button type="submit" class="submit-btn">ثبت بلاگ</button>
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
            value: "<p>This is initial <strong>editable</strong> content.</p>",
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

          const postContent = @json($blog->content); // If content is HTML
          quill.root.innerHTML = postContent;
      
          function submitForm() {
            var html = quill.root.innerHTML.trim();
            if(html === '<p><br></p>' || html === '') {
              alert('لطفا متن بلاگ را وارد کنید.');
              return false;
            }
            document.getElementById('bodyInput').value = html;
            return true;
          }
        </script>
      </body>
    </x-layout.app>