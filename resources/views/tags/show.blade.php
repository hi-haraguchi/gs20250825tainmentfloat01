<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      タグ: {{ $tag->tag }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @forelse ($thoughts as $thought)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
              <p class="text-gray-800 dark:text-gray-300">{{ $thought->tag }}</p>
              <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ $thought->title->title ?? 'タイトル未設定' }}
              </p>
            </div>
          @empty
            <p>このタグにはまだ投稿がありません。</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
