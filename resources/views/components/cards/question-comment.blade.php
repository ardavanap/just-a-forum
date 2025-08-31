<div class="answer">
    <div class="answer-header">
      <span>کاربر: {{ $user }}</span>
      <span>{{ $date }}</span>
    </div>
    <div class="answer-body">
        {{ $content }}
    </div>
    <div class="answer-actions">
      <form method='POST' action="/comment/question/like">
      
        <input type="hidden" name="commentID" value="{{ $commentID }}">
        <button type='submit'>👍 {{ $likes }}</button> 
        @csrf

      </form>
    </div>
  </div>