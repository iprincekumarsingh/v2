@include('layouts.aheader')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
    #data {
        justify-content: center;
        display: flex;
        width: 80vw;
        flex-direction: row-reverse;
        flex-wrap: wrap;
    }

</style>

<div style="padding: 10px;" class="row">
    <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
            <div class="card-body">
                <button onclick="generate()" class="btn btn-outline-success" type="button">Generate Attendance
                    Code</button>


                <div id="codeg" style="padding: 10px;text-align:center;font-weight:900" class="">
                    <span>fdfgdg</span>
                    Attendance- 4320
                </div>
            </div>
        </div>

        <div id="data" class="hero-">
        </div>
        {{-- </div> --}}


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function fetchRecords() {
                $.ajax({
                    url: 'codedelete',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        $("#data").html("");
                        $.each(response.code, function(key, item) {
                            $('#data').append(` <div class="card h">
                <div style="text-align:center" class="card-body">
                    <h5 class="card-title">` + item.code + `</h5>
                    <button onclick="comingsoon()" class="btn btn-primary todobtn">Deactivate the code</a>


                </div>
                 </div>`)
                        })
                    }
                });
            }
            fetchRecords()

            var hello = document.getElementById("codeg").innerHTML = "";

            const characters = '0123456789';

            function generate() {

                function generateString(length) {
                    let result = ' ';
                    const charactersLength = characters.length;
                    for (let i = 0; i < length; i++) {
                        result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    }
                    return result;
                }
                var hello = document.getElementById("codeg").innerHTML = generateString(4);
                $.ajax({
                    type: "GET",
                    url: "/codesave",
                    data: {
                        code: hello
                    },
                    cache: false,
                    success: function(data) {
                        Toastify({
                            text: "Code Genrated Successfully",
                            className: "success",
                            duration: 3000,
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                        fetchRecords()
                    }
                });

            }

            function comingsoon() {

                Toastify({
                    text: "Coming Soon",
                    className: "danger",
                    duration: 3000,
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    }
                }).showToast();

            }
        </script>
