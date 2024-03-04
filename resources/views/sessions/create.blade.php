<x-layout>
    <section class="px-6 px-8">
        <main class="max-w-lg mx-auto mt-10 ">
           <x-panel>
            <h1 class="text-center font-bold text-xl">Log in!</h1>
            <form method="POST" action="/login" class="mt-5">
                @csrf
                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="password" type="password" autocomplete="password"/>
                <div class="mb-6">
                    <x-form.button>
                       Log In
                    </x-form.button>
                </div>
            </form>
          </x-panel>
        </main>
    </section>
</x-layout>
