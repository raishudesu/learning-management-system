<x-base-layout>
    <x-slot:title>
        Teacher Dashboard
    </x-slot:title>
    <x-dashboard.header></x-dashboard.header>
    <main class="container mx-auto">


        <div class="container p-6">
            @if (empty($courses))
                <div class="hero bg-base-200 min-h-screen">
                    <div class="hero-content text-center">
                        <div class="max-w-md">
                            <h1 class="text-5xl font-bold">You don't have any courses yet.</h1>
                            <p class="py-6">
                                Click the button below to create your first course!
                            </p>
                            <button class="btn btn-primary">Get Started</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="container grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($courses as $course)

                        <div class="card w-full bg-base-100 card-md shadow-sm">
                            <div class="card-body gap-4">
                                <div class="flex justify-between flex-col md:flex-row gap-2">

                                    <h2 class="card-title">{{$course->title}}</h2>
                                    <div class="badge badge-neutral badge-dash"> {{$course->course_code}}</div>
                                </div>
                                <p>
                                    {{  $course->description}}
                                </p>
                                <div class="justify-end card-actions">
                                    <button class="btn  btn-primary w-full md:w-auto">View Course</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>



    </main>
</x-base-layout>