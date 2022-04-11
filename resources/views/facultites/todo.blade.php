@include('layouts.aheader')
<div class="card card-body border-0 shadow mb-4">
    <h2 class="h5 mb-4">Todo List</h2>
    <form action="{{ route('fatodoSave') }}" method="POST">
        <input name="key" value="0" hidden>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div>
                    <label for="first_name">Title</label>
                    <input name="title" class="form-control" id="first_name" type="text" placeholder="Todo Title"
                        required="">
                    <br>
                    <textarea name="text" style="height: 137px;" placeholder="Enter your work to do...." class="form-control" name="" id=""
                        cols="30" rows="10"></textarea>
                </div>
            </div>

        </div>

        <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
        </div>
    </form>
    <style>
        .h {
            margin: 10px;
        }

    </style>
    <div style="display: flex;flex-wrap:wrap;justify-content:center;margin-top:1px" class="hero-flex">

        @foreach ($todo as $todoo)
            <div class="card h" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $todoo['title'] }}</h5>
                    <p class="card-text">{{ $todoo['text'] }}</p>
                    <a href="{{ url('todo') }}/{{ $todoo['fid'] }}" class="btn btn-primary todobtn">Delete</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
