<x-layout.app title="موضوعات" style="topic">
<body class="topics-page">
  <div class="topics-container">
    <h1>موضوعات</h1>

    @foreach ( $topics as $topic )
      <x-cards.topic>
        <x-slot:id> {{ $topic->id }} </x-slot:id>
        <x-slot:title> {{ $topic->title }} </x-slot:title>
        <x-slot:content> {{ $topic->content }} </x-slot:content>
      </x-cards.topic>      
    @endforeach
    {{ $topics->links() }}
  </div>

</body>
</x-layout.app>