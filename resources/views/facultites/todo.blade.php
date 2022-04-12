@include('layouts.aheader')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<div class="card card-body border-0 shadow mb-4">
    <h2 class="h5 mb-4">Todo List</h2>
    <form id="form_id" action="{{ route('fatodoSave') }}" method="POST">
        <input name="key" value="0" hidden>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <div>
                    <label for="first_name">Title</label>
                    <input id="title" name="title" class="form-control" type="text" placeholder="Todo Title"="">
                    <br>
                    <textarea id="text" name="text" style="height: 137px;" placeholder="Enter your work to do...." class="form-control"
                        name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>

        </div>

        <div class="mt-3">
            <button id="todobtn" class="btn btn-gray-800 mt-2 animate-up-2" type="">Save</button>
        </div>
    </form>
    <style>
        .h {
            margin: 10px;
        }

    </style>
    <div id="data" style="display: flex;flex-wrap:wrap;justify-content:center;margin-top:1px" class="hero-flex">


    </div>
</div>

<script>
    // fetch


    function fetchRecords() {
        $.ajax({
            url: 'tododata',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $("#data").html("");
                $.each(response.todo, function(key, item) {
                    $('#data').append(` <div class="card h" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">` + item.title + `</h5>
                    <p class="card-text">` + item.text + `</p>
                    <a  href='todo/` + item.fid + `' class="btn btn-primary todobtn">Delete</a>
                </div>
                 </div>`)
                })
            }
        });
    }
    fetchRecords()
    $("#todobtn").click(function(e) {
        e.preventDefault();

        var title = $("#title").val()
        var text = $("#text").val()
        // console.log(id);
        $.ajax({
            type: "POST",
            url: "/todo",
            data: {
                title: title,
                text: text,
                "_token": "{{ csrf_token() }}",
            },
            cache: false,
            success: function(data) {
                Toastify({
                    text: "Todo added successfully",
                    className: "success",
                    duration: 3000,
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    }
                }).showToast();
                fetchRecords()
                document.getElementById("form_id").reset();

            }
        });

        return false;
    });



    // fetchRecords()
</script>
