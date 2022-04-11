<x-app-layout>
    @include('links.css')

<div class="card card-body border-0 shadow">
    <h2 class="h5 mb-4">Upload Assignment</h2>
    <input type="text" style="width:300px;" class="me-5" name="" placeholder="Title" id="">
    <div class="d-flex align-items-center">
        <div class="me-3">
            <!-- Avatar -->
            <img class="rounded avatar-xl" src="../assets/img/profile-cover.jpg" alt="change cover">
        </div>
        <div class="file-field">
            <div class="d-flex justify-content-xl-center ms-xl-3">
                <div class="d-flex">
                    <svg class="icon text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                    <input type="file">
                    <div class="d-md-block text-left">
                        <div class="fw-normal text-dark mb-1">Choose Image</div>
                        <div class="text-gray small">JPG,PDF,GIF or PNG. Max size of 2MB</div>
                    </div>
                </div>
            </div>
         </div>                                        
    </div>
</div>
</x-app-layout>