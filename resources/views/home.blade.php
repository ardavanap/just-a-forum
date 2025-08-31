<x-layout.app title="صفحه نخست" style="home">
  <body>  
    <main class="container">
      <section class="section">
        <h1>انجمن گفتگو</h1>
        <p>در بخش انجمن می‌تونی با دیگران گفتگو کنی، سوال بپرسی یا به دیگران کمک کنی. فضای آزاد برای تبادل تجربه و اطلاعات.</p>
        <a href="{{ route("question.index") }}"><button class="btn">ورود به انجمن</button></a>
      </section>

      <section class="section">
        <h1>بلاگ</h1>
        <p>در بلاگ، مقاله‌ها و مطالب تحلیلی و آموزشی منتظر تو هستن. اگه دوست داری بیشتر بدونی و یاد بگیری، اینجا جای توئه!</p>
        <a href="/blog"><button class="btn">ورود به بلاگ</button></a>
      </section>
    </main>
  </body>
</x-layout.app >