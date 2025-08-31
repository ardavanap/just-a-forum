<!DOCTYPE html><html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>انتخاب موضوعات مورد علاقه - JustAForum</title>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #344966;
      color: #D9E6F1;
      padding: 2rem;
    }.container {
  max-width: 1000px;
  margin: 0 auto;
}

h1 {
  text-align: center;
  margin-bottom: 2rem;
  color: #B4CDED;
}

.topic-grid {
  column-count: 3;
  column-gap: 1rem;
}

.topic-card {
  display: inline-block;
  width: 100%;
  margin-bottom: 1rem;
  background-color: #0D1821;
  padding: 1rem;
  border: 2px solid #B4CDED;
  border-radius: 10px;
  color: #D9E6F1;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.topic-card.selected {
  background-color: #B4CDED;
  color: #0D1821;
}

.submit-btn {
  margin-top: 2rem;
  display: block;
  width: 100%;
  padding: 1rem;
  background-color: #B4CDED;
  color: #0D1821;
  border: none;
  border-radius: 10px;
  font-size: 1.2rem;
  cursor: pointer;
  font-weight: bold;
}

@media (max-width: 768px) {
  .topic-grid {
    column-count: 1;
  }
}

  </style>
</head>
<body>
  <div class="container">
    <h1>حذف موضوعات مورد علاقه</h1>
    <form id="interestForm" method="POST" action="/tag">
      <div class="topic-grid">
        @csrf
        
        @foreach ($userTags as $userTag)
          <div class="topic-card" data-id="{{ $userTag->id }}">{{ $userTag->title }}</div>
        @endforeach

      </div>
      {{-- <div class="container"> --}}
      <div>

        <h1>اضافه کردن به موضوعات مورد علاقه</h1>
        <br>
        @foreach ($tagsUserDoesNotHave as $tag)
            <div class="topic-card" data-id="{{ $tag->id }}">{{ $tag->title }}</div>
          @endforeach
        
      </div>
      <input type="hidden" name="selectedTags" id="selectedTopics">
      <button type="submit" class="submit-btn">تایید</button>
    </form>
  </div>
    
    <script>
  const cards = document.querySelectorAll('.topic-card');
  const hiddenInput = document.getElementById('selectedTopics');

  cards.forEach(card => {
    card.addEventListener('click', () => {
      card.classList.toggle('selected');
    });
  });

  document.getElementById('interestForm').addEventListener('submit', function(e) {
    const selected = Array.from(document.querySelectorAll('.topic-card.selected'))
                        .map(card => card.dataset.id);
    hiddenInput.value = selected.join(',');
  });

  // document.getElementById('notInterestForm').addEventListener('submit', function(e) {
  //   // debugger 
  //   const selected = Array.from(document.querySelectorAll('.topic-card.selected'))
  //                       .map(card => card.dataset.id);
  //   hiddenInput.value = selected.join(',');
  // });
</script>

  </div>
</body>
</html>