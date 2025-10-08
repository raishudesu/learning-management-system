<x-layout>
    <x-slot:title>
        Sign up
    </x-slot:title>
    <div class="hero bg-base-200 min-h-screen">
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

                <button class="btn btn-neutral mt-4" type="submit">Register</button>
            </fieldset>
        </form>
    </div>

</x-layout>