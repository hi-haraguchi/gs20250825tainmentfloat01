<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('選択したエンタメの詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{-- 戻るリンク --}}
          <a href="{{ route('titles.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">一覧に戻る</a>

          {{-- タイトル情報 --}}
          <p class="text-gray-800 dark:text-gray-300 text-lg">{{ $title->title }}</p>
          <div class="text-gray-600 dark:text-gray-400 text-sm">
            <p>作成日時: {{ $title->created_at->format('Y-m-d H:i') }}</p>
            <p>更新日時: {{ $title->updated_at->format('Y-m-d H:i') }}</p>
          </div>

          {{-- 編集・削除 --}}
          <div class="flex mt-4">
            <a href="{{ route('titles.edit', $title) }}" class="text-blue-500 hover:text-blue-700 mr-2">編集</a>
            <form action="{{ route('titles.destroy', $title) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
            </form>
          </div>
        </div>
      </div>

      {{-- --- Thought投稿フォーム --- --}}
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="text-lg font-semibold mb-2">感想を投稿する</h3>
          <form action="{{ route('thoughts.store', $title) }}" method="POST">
            @csrf
            <input type="text" name="part" class="w-full border rounded p-2 text-gray-800 mt-2"  placeholder="どの部分が印象に残りましたか（ページ数や巻数など）">
            <textarea name="thought" class="w-full border rounded p-2 text-gray-800" rows="3" placeholder="感想を入力してください..."></textarea>
            <input type="text" name="tag" class="w-full border rounded p-2 text-gray-800 mt-2"  placeholder="タグ（例: 元気を出したいとき）">
            @error('thought')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
              投稿
            </button>
          </form>
        </div>
      </div>

      {{-- --- Thought一覧 --- --}}
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="text-lg font-semibold mb-2">（編集用）感想一覧</h3>
          @forelse ($title->thoughts as $thought)
            <div class="mb-3 p-3 bg-gray-100 dark:bg-gray-700 rounded">

              <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $thought->part }}</p>

              <p>{{ $thought->thought }}</p>

              @if ($thought->tag)
              <p class="text-sm text-blue-600 dark:text-blue-400 mt-1">#{{ $thought->tag->tag }}</p>
              @endif

              <p class="text-xs text-gray-500 mt-1">{{ $thought->created_at->format('Y-m-d H:i') }}</p>
            </div>
          @empty
            <p class="text-gray-500">まだ感想は投稿されていません。</p>
          @endforelse
        </div>
      </div>

    </div>
  </div>
</x-app-layout>

