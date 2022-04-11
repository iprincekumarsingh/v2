<x-app-layout>
    <style>
        body {}

    </style>
    @include('links.css')
    <div class="card  border-0 text-center p-0">
        <div class="profile-cover rounded-top" data-background="" style=""></div>
        <div class="card-body pb-5">
            <img src="{{ Auth::user()->profile_photo_url }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4"
                alt="Neil Portrait">
            <h4 class="h3"> {{ Auth::user()->name }}</h4>
            @if(session('isSubmitted')==0)
                
            <form action="{{ route('attendance-submit') }}" method="post">
                @csrf
                <input class="btn btn-sm btn-secondary" type="submit" value="Submit Attendance">
            </form>
            @else
            <button  class="btn btn-sm btn-secondary">attendance-submitted</button>
            @endif

        </div>
    </div>
</x-app-layout>
