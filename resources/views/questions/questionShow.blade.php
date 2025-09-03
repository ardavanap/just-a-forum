<x-layout.app title="سوال | {{ $question->title }}" style="question-show">
<body class="question-show-page">
  
    <div class="question-header">
      <h1 class="question-title">{{ $question->title }}</h1>
      
      @if ($question->solved)
      <div class="question-status-solved">حل شده</div>
      @else
      <div class="question-status-not-solved">حل نشده</div>
      @endif

    </div>
  
    <div class="question-body">
      {!! $question->content !!} <br><br>
      <span>کاربر: {{ $question->user->nickname }}</span>
      <span> <br>تاریخ: {{ $question->created_at }} </span>
      @can('edit', $question)
        <a href="/question/{{ $question->id }}/edit"> <span class='edit-and-delete-buttons'> ویرایش </span> </a>
        <a href=""> <span class='edit-and-delete-buttons'> حذف </span> </a>
      @endcan
    </div>
  
    <div class="answers-section">
      <h2>پاسخ‌ها</h2>
  
        @if ($bestComment)
          <x-cards.question-comment-best>
            <x-slot:user> {{ $bestComment->user->nickname }} </x-slot>
            <x-slot:date> {{ $bestComment->created_at }} </x-slot>
            <x-slot:content> {{ $bestComment->content }} </x-slot>
            <x-slot:commentID> {{ $bestComment->id }} </x-slot>
            <x-slot:likes> {{ $bestCommentlikes }} </x-slot>
          </x-cards.question-comment-best>
        @endif
          
        @foreach ($comments as $comment )
        <x-cards.question-comment>
          <x-slot:user> {{ $comment->user->nickname }} </x-slot>
          <x-slot:date> {{ $comment->created_at }} </x-slot>
          <x-slot:content> {{ $comment->content }} </x-slot>
          <x-slot:commentID> {{ $comment->id }} </x-slot>
          <x-slot:likes> {{ $comment->questionCommentLike->count() }} </x-slot>
        </x-cards.question-comment>
        @endforeach
      
      </div>
    </div>
  
    <div class="comment-form">
      <h3>نظر خود را بنویسید</h3>
      <form method="POST" action="/comment/question">
        <textarea name="comment" placeholder="نظر خود را بنویسید..."></textarea>
        <input type="hidden" name="questionID" value="{{ $question->id }}">

        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div>
              <p><strong> {{ $error }} </strong></p>
            </div>
          @endforeach
        @endif

        <button type="submit">ارسال نظر</button>
        @csrf
      </form>
    </div>
</x-layout.app>