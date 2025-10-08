<x-layout>
    <x-slot:title>
        Sign in
    </x-slot:title>

    <div class="flex flex-col items-center justify-center flex-grow">
        <form method="POST" action="/login">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Login</legend>

                <label class="label">Email</label>
                <input name="email" type="email" class="input" placeholder="Email" value="{{ old('email') }}" />

                @error('email')
                    <span class="text-error">
                        {{ $message }}
                    </span>
                @enderror

                <label class="label">Password</label>
                <input name="password" type="password" class="input" placeholder="Password" />

                <button class="btn btn-primary mt-4" type="submit">Sign in</button>

                <div class="divider">Doesn't have an account?</div>
                <a href="/register" class="btn btn-block">Sign up</a>
            </fieldset>

        </form>
    </div>

</x-layout>