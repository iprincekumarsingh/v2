@include('layouts.aheader')
@include('links.css')

<div class="card border-0 shadow mb-4">
    @if (count($studentPAttendance) < 0)
        <h1>Attendance Not Present</h1>
    @else
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>

                            <th class="border-0">Name</th>
                            <th class="border-0">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->

                        @foreach ($studentPAttendance as $item)
                            <tr>
                                <td>
                                    @if ($item['name'] == null)
                                        {{ $name }}
                                    @else
                                        {{ $item['name'] }}
                                    @endif
                                </td>

                                <td class="fw-bold d-flex align-items-center">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('DD-MM-YYYY') }}
                                </td>
                                <td><a class="btn btn-outline-danger"
                                        href="{{ url('/blockatd') }}/{{ $item['aid'] }}">Block
                                    </a></td>
                            </tr>
                        @endforeach
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
    @endif

</div>
</div>
