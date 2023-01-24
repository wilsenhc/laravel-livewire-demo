<div>
    <div class="flow-root">
        @foreach ($posts as $index => $post)
        <ul role="list" class="-my-5">
            <li class="py-6 divide-y divide-gray-200 dark:divide-gray-700">
                <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                    <h3 class="text-sm font-semibold">
                    <a href="#" class="hover:underline focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        {{ $post->title }}
                    </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-400 line-clamp-2">
                        {{ $post->content }}
                    </p>
                    <div class="text-xs text-gray-500">
                        {{ __('Posted by: :name', ['name' => $post->user->name]) }}
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>
</div>
