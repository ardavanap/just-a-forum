<div class="comment">
    <div class="comment-header">
      <span><strong>{{ $user }}</strong></span>
      <span>{{ $date }}</span>
    </div>
    <div class="comment-body">
      {{ $comment }}
    </div>
    <div class="comment-actions">
      
      <form method='POST' action="/comment/blog/like">
      
        <input type="hidden" name="commentID" value="{{ $commentID }}">
        <button type='submit'>👍 {{ $likes }}</button> 
        @csrf

      </form>



        @if (auth()->id())
          
        <button onclick="toggleReplyForm(this)">پاسخ</button>

          <div class="comment-form" style="display: none;">
          <form method="POST" action="/comment/blog">
          <textarea name="comment" placeholder="پاسخ خود را بنویسید..."></textarea>
          @csrf
          <input type="hidden" name="parentID" value="{{ $commentID }}">
          <input type="hidden" name="blogID" value="{{ $blogId }}">
          <button type='submit' class="send-reply">ارسال پاسخ</button>
          </form>
        </div>
        @endif


    </div>
