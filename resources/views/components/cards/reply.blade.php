<div class="replies">
    <div class="comment">
      <div class="comment-header">
        <span><strong>{{ $user }} </strong></span>
        <span>{{ $date }}</span>
      </div>
      <div class="comment-body">
        {{ $comment }}
      </div>
    </div>
    <div class="comment-actions">

      <form method='POST' action="/comment/blog/like">
      
        <input type="hidden" name="commentID" value="{{ $commentID }}">
        <button type='submit'>👍 {{ $likes }}</button> 
        @csrf

      </form>
        @if((auth()->user()?->isAdmin() || $commentOwnerId->toHtml() == auth()->id()) )
            <a href=""> <span class='edit-and-delete-buttons'> حذف </span> </a>
        @endif

      </div>
  </div>
  