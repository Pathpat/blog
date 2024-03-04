@props(['heading'])

<section class="px-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 border-b ">
        {{ $heading }}
    </h1>
    <div class="flex">
        <asside class="w-48 shrink-flex-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New Post</a>
                </li>
            </ul>
        </asside>
    <main class="flex-1">
        <x-panel>
            {{ $slot }}
        </x-panel>
    </main>
    </div>
</section>
