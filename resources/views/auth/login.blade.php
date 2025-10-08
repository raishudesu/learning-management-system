<x-layout>
    <x-slot:title>
        Sign in
    </x-slot:title>

    <div class="hero bg-base-200 min-h-screen">
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

                <button class="btn btn-neutral mt-4" type="submit">Login</button>
            </fieldset>
        </form>
    </div>
</x-layout>