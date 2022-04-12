@include('layouts.aheader')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

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
                    Swal.fire(
                        'Code Genrated Successfully!',
                        '',
                        'success'
                    )
                }
            });

        }

    </script>
