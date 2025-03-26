{{-- <x-base> --}}
    <div class="container">
        <h1 style="margin-top: 20px">Schedules per department</h1>
        <a href="schedules/create" class="btn btn-primary mb-3" style="width: 200px;">Add a shift</a>
        <h4>Here we can look at the schedules of each department</h4>
        <br></br>
    </div>

    <div class="container">
        <table id="scheduleTable" class="table table-bordered">
            <thead>
                <tr>
                    <b>
                        <th>Monday   </th>
                        <th>Tuesday  </th>
                        <th>Wednesday</th>
                        <th>Thursday </th>
                        <th>Friday   </th>
                        <th>Saturday </th>
                    </b>
                </tr>
            </thead>

            <tbody>
                @foreach ($schedules as $schedule)
                    <td><a href="schedules/{{$schedule->id}}">{{$schedule->start_time}} --- {{$schedule->end_time}}</a></td>
                @endforeach
            </tbody>

        </table>
    </div>  
{{-- </x-base> --}}