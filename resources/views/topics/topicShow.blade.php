<x-layout.app title="انجمن" style="question">
    <body class="topic-questions-page">
    
      <div class="topic-questions-container">
        <div class="topic-questions-header">
          <h1>موضوع: {{ $questions[0]->topic->title }}</h1>
          <input type="text" placeholder="جستجوی سوال..." oninput="filterQuestions(this.value)">
        </div>
    
        <div class="questions-list" id="questionList">

          @auth
          <a href="/question/create"  style="width:120px;height:50px;background-color:#344966;"> ساخت بلاگ </a>
          @endauth
    
            {{-- card hae soal ha --}}
            @foreach($questions as $question)
              <x-cards.question-card >
                  <x-slot:id> {{ $question->id }} </x-slot>
                  <x-slot:date> {{ $question->date }} </x-slot>
                  <x-slot:title> {{ $question->title }} </x-slot>
                  <x-slot:author> {{ $question->user->nickname }} </x-slot>
                  <x-slot:content> {{ strip_tags($question->content) }} </x-slot>
              </x-cards.question-card>
            @endforeach 
    
              {{ $questions->onEachSide(2)->links() }}
    
        </div>
      </div>
    
      {{-- Js e qesmate search --}}
      <script>
        function filterQuestions(value) {
          const items = document.querySelectorAll(".question-card");
          items.forEach((el) => {
            const text = el.textContent.toLowerCase();
            el.style.display = text.includes(value.toLowerCase()) ? "block" : "none";
          });
        }
      </script>
    </x-layout.app>