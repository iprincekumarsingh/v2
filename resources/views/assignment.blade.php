<x-app-layout>
    @include('links.css')

    <div class="card card-body border-0 shadow">
        <h2>Branch: {{ Auth::user()->branch }}</h2>
        <h2 class="h5 mb-4">Upload Assignment</h2>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subject</label>
            {{-- <label class="my-1 me-2" for="country">Country</label> --}}
            @if (count($subject) > 0)
                <h1>No Subject Alloted</h1>
            @else
                <select class="form-select" id="country" aria-label="Default select example">
                    <option selected>Choose Subject</option>
                    @foreach ($subject as $sname)
                        <option value="{{ $sname['subject_id'] }}">{{ $sname['subject_name'] }}</option>
                    @endforeach
            @endif



            </select>
        </div>
        <label class="my-1 me-2" for="country">Choose Semester</label>
        <select class="form-select" id="country" aria-label="Default select example">
            <option selected>Choose Sem</option>
            <?php
            $sem_code = 8;
            ?>

                    @for ($i = 1; $i <= $sem_code; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @if (Auth::user()->branch == 'DEMO_DATA')
                                @if ($i == 6)
                                @break
                            @endif
                        @endif
                    @endfor


    </select>
</div>
</x-app-layout>
