<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('自分が触れたエンタメ一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @foreach ($titles as $title)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
              <p class="text-gray-800 dark:text-gray-300">{{ $title->title }}</p>
              <a href="{{ route('titles.show', $title) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>

              {{-- Thoughts の表示 --}}
              @if($title->thoughts->isNotEmpty())
              <ul class="mt-2 list-disc list-inside text-sm text-gray-600 dark:text-gray-300">
                @foreach($title->thoughts as $thought)
                <li>{{ $thought->thought }}</li>
                @endforeach
              </ul>
              @else
                <p class="text-gray-500 text-sm mt-2">まだ感想がありません。</p>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
