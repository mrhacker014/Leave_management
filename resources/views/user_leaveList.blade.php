@extends("layout.adminlayout")
@section("admin")
@php
    $pageNumber = ($data->currentPage() - 1) * $data->perPage();
@endphp
<div class="main-div">
     <h1 class="list-heading">Users Leave List</h1>
     <div class="user-table">
          <div class="table-responsive">
               @if ($data)
               <table>
                    <thead>
                         <tr>
                              <th>Sl no.</th>
                              <th>Employee id</th>
                              <th>Name</th>
                              <th>Reason</th>
                              <th>Leave message</th>
                              <th>Document</th>
                              <th>From_date</th>
                              <th>To_date</th>
                              <th>Total leave</th>
                              <th>Status</th>
                         </tr>
                    </thead>
                    @foreach ($data as $key=>$d)
                    <tbody>
                         <td>{{ $pageNumber + $loop->iteration }}</td>
                         <td>{{$d->empid}}</td>
                         <td>{{$d->name}}</td>
                         <td>{{$d->reason}}</td>
                         <td>{{$d->leave_message}}</td>
                         <td>
                              @if($d->document)
                                   <a class="sol-dow" href="{{asset('/documents/' . $d->document)}}" download>Downlode</a>
                              @else
                                  <p>No Need</p>
                              @endif
                         </td>
                         <td>{{$d->fromdate}}</td>
                         <td style="padding-left: 12px !important;padding-right: 12px !important;">{{$d->todate}}</td>
                         <td>{{$d->leave_days}}</td>
                         <td>
                              @if ($d->leave_status == "Pending")
                                   <a href="/user-leave-list/{{$d->leave_id}}" style="text-decoration: none; color:red;">{{$d->leave_status}}</a>
                              @else
                              <a href="/user-leave-list/{{$d->leave_id}}" style="text-decoration: none; color: green;">{{$d->leave_status}}</a>
                              @endif     
                         </td>

                    </tbody>
                    @endforeach
               </table>
               @else
               <p>no data found</p>
               @endif
               <div>{{$data->links()}}</div>
          </div>
     </div>
</div>
@endsection