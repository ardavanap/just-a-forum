{{-- @props() --}}

<x-layout.app title="بلاگ - JustAForum" style="blog">
  <body class="blog-list-page">

    <div class="blog-list-container">
      
      @auth
      <a href="/blog/create" class='blog-card' style="width:120px;height:50px;background-color:#344966;"> ساخت بلاگ </a>
      @endauth

      @foreach ($blogs as $blog )
        <x-cards.blog>
          <x-slot:id> {{ $blog->id }} </x-slot:id>
          <x-slot:title> {{ $blog->title }} </x-slot:title>
          <x-slot:content> {{ \Illuminate\Support\Str::words(strip_tags($blog->content), 14, '...')}} </x-slot:content>
        </x-cards.blog>
      @endforeach

    </div>
    {{ $blogs->links() }}
  </body>
</x-layout.app>