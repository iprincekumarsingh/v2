@include('layouts.aheader')
    @if (session('formid') == 1)
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Branch Information</h2>
            <form action="{{ route('branchSave') }}" method="POST">
                <input name="key" value="0" hidden>
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Branch Name</label>
                            <input name="name" class="form-control" id="first_name" type="text"
                                placeholder="Enter branch name" required="">
                        </div>
                    </div>

                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
            </form>
        </div>
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Add Sub Branch Information</h2>
            <form action="{{ route('branchSave') }}" method="POST">
                @csrf
                <input name="key" value="1" hidden>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Sub Branch Name</label>
                            <input name="name" class="form-control" id="first_name" type="text"
                                placeholder="Enter branch name" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Branch Under</label>
                            <select name="branch" class="form-select mb-0" id="gender"
                                aria-label="Gender select example">
                                <option selected="">Branch</option>
                                @foreach ($branch as $branches)
                                    <option value="{{ $branches['branch_id'] }}">{{ $branches['name'] }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>
            </form>
        </div>
    @else
    @endif
