 @include('layouts.aheader')

 <div class="card border-0 shadow mb-4">
     <div class="card card-body border-0 shadow mb-4">

         <form action="{{ route('filterBranch') }}" method="POST">
             @csrf
             <div style="display: flex" class="row">
                 <label for="gender">Filter Branch</label>
                 <select name="branchid" class="form-select mb-0" id="gender" aria-label="Gender select example">
                     <option selected="">Branch</option>
                     @foreach ($branch as $branches)
                         <option value="{{ $branches['name'] }}">{{ $branches['name'] }}</option>
                     @endforeach

                 </select>
                 <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
             </div>



     </div>

     </form>
 </div>
 <div class="table-responsive">
     <table class="table table-centered table-nowrap mb-0 rounded">
         <thead class="thead-light">
             <tr>
                 <th class="border-0 rounded-start">#</th>
                 <th class="border-0">Name</th>
                 <th class="border-0">Branch</th>
                 <th class="border-0">Registration No.</th>
                 <th style="text-align: center" class="border-0">Action</th>
                 {{-- <th class="border-0">Profile</th> --}}
                 {{-- <th class="border-0 rounded-end">Ch/ange</th> --}}
             </tr>
         </thead>
         <tbody>
             <!-- Item -->
             @foreach ($student as $user)
                 <tr>
                     <td><a href="#" class="text-primary fw-bold">1</a> </td>
                     <td class="fw-bold d-flex align-items-center">
                         {{-- <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg> --}}
                         {{ $user['name'] }}
                     </td>
                     <td>
                         {{ $user['branch'] }}
                     </td>
                     <td>
                         {{ $user['regno'] }}
                     </td>
                     <td style="text-align: center">
                         <a class="btn btn-outline-danger"
                             href="{{ url('user-profile') }}/{{ $user['regno'] }}">Profile</a>
                         <a class="btn btn-outline-info"
                             href="{{ url('/userfattendance') }}/{{ $user['name'] }}/{{ $user['id'] }}">Attendance</a>
                     </td>


                 </tr>
             @endforeach
             <!-- End of Item -->


         </tbody>
     </table>
 </div>
 </div>
 </div>
 <main class="content">
