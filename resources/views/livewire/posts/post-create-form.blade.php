<div x-data="{ open: @entangle('open') }">
    <div class="flex justify-between" :class="{'mb-6 pb-6 border-b dark:border-gray-700': open }">
        <p class="font-semibold">
            {{ __('Create post') }}
        </p>

        <button
            type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            @click="open = !open"
        >
            {{ __('Create') }}
        </button>
    </div>

    <form wire:submit.prevent="save" class="space-y-6" x-show="open">
        <div>
            <label for="title" class="block text-sm font-medium">{{ __('Title') }}</label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <input
                    id="title"
                    wire:model="post.title"
                    type="text"
                    name="title"
                    autocomplete="title"
                    class="block w-full min-w-0 flex-1 rounded-md border-gray-300 dark:border-gray-900 dark:bg-gray-700 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                />
            </div>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium">{{ __('Content') }}</label>
            <div class="mt-1">
                <textarea
                    id="content"
                    wire:model="post.content"
                    name="content"
                    rows="3"
                    class="block w-full rounded-md border-gray-300 dark:border-gray-900 dark:bg-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                ></textarea>
            </div>
        </div>

        <div class="flex w-full justify-end">
            <button
                type="submit"
                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ __('Create post') }}
            </button>
        </div>
    </form>
</div>
