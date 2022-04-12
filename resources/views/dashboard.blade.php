{{-- <x-app-layout> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

@if (Auth::user()->role == 'admin')
    @include('admin.homeAdmin')
@elseif(Auth::user()->role == 'facul')
    @include('facultites.dashfal')
@else
    <style>




    </style>

    @include('links.css')
    <div class="card  border-0 text-center p-0">
        <div class="profile-cover rounded-top" data-background="" style=""></div>
        <div class="card-body pb-5">
            <img src="{{ Auth::user()->profile_photo_url }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4"
                alt="Neil Portrait">
            <h4 class="h3"> {{ Auth::user()->name }}</h4>


            <div class="row-f">


                @if (session('isSubmitted') == 0)
                    <form>

                        <input id="code" style="border: 1px solid black" class="btn "
                            placeholder="Attendance Code" type="text"><br>
                        <br>
                    </form>
                    <button onclick="hello()" class="btn btn-sm btn-secondary">Submit Attendance</button>
                @else
                    <button class="btn btn-sm btn-secondary">attendance-submitted</button>
                @endif
            </div>
        </div>
    </div>
    <script>
        function hello() {
            // let _token = $('meta[name="csrf-token"]').attr('content');

            var id = $("#code").val()
            console.log(id);
            $.ajax({
                type: "POST",
                url: "/attendance",
                data: {
                    code: id,
                    "_token": "{{ csrf_token() }}",
                },
                cache: false,
                success: function(data) {
                    window.location.reload()
                }
            });
        }
    </script>
@endif
