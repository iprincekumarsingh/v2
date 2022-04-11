<x-app-layout>
    @include('links.css')

    <div class="card border-0 shadow mb-4">
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
                                    {{$item['name']}}
                                    @endif
                                </td>

                                <td class="fw-bold d-flex align-items-center">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('DD-MM-YYYY') }}
                                </td>
                            </tr>
                        @endforeach
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
