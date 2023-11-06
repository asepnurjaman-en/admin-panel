<nav class="w-full rounded-md py-2 mb-2 dark:bg-neutral-600">
    <ol class="list-reset flex text-sm">
        @foreach ($breadcrumb as $item)
        @if ($item['url']=='#')
        <li class="text-neutral-400 dark:text-neutral-300">{{ $item['title'] }}</li>
        @else
        <li>
            <a class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                href="{{ $item['url'] }}">{{ $item['title'] }}</a>
        </li>
        <li>
            <span class="mx-2 text-neutral-400 dark:text-neutral-300">/</span>
        </li>
        @endif
        @endforeach
    </ol>
</nav>