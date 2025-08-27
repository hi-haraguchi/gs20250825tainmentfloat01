<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('どんな気分ですか？　それにピッタリのエンタメを検索します！') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @foreach ($tags as $tag)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
              {{-- タグ名 --}}
              <p class="text-gray-800 dark:text-gray-300 font-semibold">#{{ $tag->tag }}</p>

              {{-- 紐づく thoughts の表示 --}}
              @if($tag->thoughts->isNotEmpty())
              <ul class="mt-2 list-disc list-inside text-sm text-gray-600 dark:text-gray-300">
                @foreach($tag->thoughts as $thought)
                  <li>
                    <span class="font-semibold">[{{ $thought->part }}]</span>
                    {{ $thought->title->title }}
                  </li>
                @endforeach
              </ul>
              @else
                <p class="text-gray-500 text-sm mt-2">まだ関連する作品がありません。</p>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
