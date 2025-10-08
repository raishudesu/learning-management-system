<x-layout>
    <x-slot:title>
        Sign up
    </x-slot:title>
    <div class="flex flex-col items-center justify-center flex-grow">
        <form method="POST" action="/register">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Register</legend>

                <label class="label">Name</label>
                <input name="name" class="input" placeholder="Your name" />
                <label class="label">Email</label>
                <input name="email" type="email" class="input" placeholder="Your email" />

                <label class="label">Role</label>
                <select name="role" class="select">
                    <option disabled selected>Pick a Role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>

                <label class="label">Password</label>
                <input name="password" type="password" class="input" placeholder="Your password" />

                <button class="btn btn-primary mt-4" type="submit">Sign up</button>

                <div class="divider">Already have an account?</div>
                <a href="/login" class="btn btn-block">Sign in</a>
            </fieldset>
        </form>
    </div>

</x-layout>