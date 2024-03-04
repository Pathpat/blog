<x-layout>
    <x-setting :heading="'Edit Category: ' . $category->name">
        <form method="POST" action="/admin/category/{{ $category->id }}" class="mt-5">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $category->name)"/>
            <x-form.input name="slug" :value="old('slug', $category->slug)"/>

            <x-form.button>
                Update
            </x-form.button>
        </form>
    </x-setting>

</x-layout>
