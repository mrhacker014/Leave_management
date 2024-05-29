@extends("layout.hrlayout")
@section("hr")
@php
    $pageNumber = ($data->currentPage() - 1) * $data->perPage();
@endphp
<div class="main-div">
     <h1 class="list-heading">List of Employees</h1>
     <div class="user-table">
          <div class="table-responsive">
               @if ($data)
               <table>
                    <thead>
                         <tr>
                              <th>Sl no.</th>
                              <th>Employee id</th>
                              <th>name</th>
                              <th>email</th>
                              <th>phone</th>
                              <th>gender</th>
                              <th>department</th>
                              <th>role</th>
                              <th>photo</th>
                              <th>status</th>
                         </tr>
                    </thead>
                    @foreach ($data as $key=>$d)
                    <tbody>
                         <td>{{ $pageNumber + $loop->iteration }}</td>
                         <td>{{$d->empid}}</td>
                         <td>{{$d->name}}</td>
                         <td><span class="email-style">{{$d->email}}</span></td>
                         <td>{{$d->phone}}</td>
                         <td>{{$d->gender}}</td>
                         <td>{{$d->deptname}}</td>
                         <td>{{$d->role}}</td>
                         <td><img src="{{asset('/images/'.$d->photo)}}" alt="" srcset="" height="90px" width="80px"></td>
                         <td>
                              @if ($d->status == "Inactive")
                                   <a href="/employeeslist/{{$d->id}}" style="text-decoration: none; color:red;">{{$d->status}}</a>
                              @else
                              <a href="/employeeslist/{{$d->id}}" style="text-decoration: none; color: green;">{{$d->status}}</a>
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