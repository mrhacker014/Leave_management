@extends("layout.hrlayout")
@section("hr")
<div class="bg-light">
     @if(session('success'))
     <div class="alert alert-success">
          {{ session('success') }}
     </div>
     @endif
     @if(session('notsuccess'))
     <div class="alert alert-success">
          {{ session('notsuccess') }}
     </div>
     @endif
     <article class="card-body mx-auto" style="max-width: 800px;">
          <h4 class="cart-title mt-3 mb-3 text-center">Leave Application</h4>
          <form action="/hr-registerleave" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Employee ID</label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" id="empid" name="empid" value="{{Session::get('empid')}}" readonly>
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Leave Reason</label>
                    <div class="col-sm-8">
                         <select class="form-control" id="reason" name="reason">
                              <option hidden>Select Reason</option>
                              <option value="Casual Leave">Casual Leave</option>
                              <option value="Medical Leave">Medical Leave</option>
                         </select>
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Leave Message</label>
                    <div class="col-sm-8">
                         <textarea class="form-control" id="leave_message" name="leave_message" placeholder="Message wirte Here"></textarea>
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Document</label>
                    <div class="col-sm-8">
                         <input type="file" class="form-control" id="document" name="document" placeholder="Uplode Document">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">From Date</label>
                    <div class="col-sm-8">
                         <input type="Date" class="form-control" id="fromdate" name="fromdate">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">To Date</label>
                    <div class="col-sm-8">
                         <input type="date" class="form-control" id="todate" name="todate">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-3 col-form-label">Total Leave</label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" id="leave_days" name="leave_days" placeholder="0 Days" readonly>
                    </div>
               </div>
               <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block" style="width: 200px;">Apply</button>
               </div>

          </form>
     </article>
</div>

<script>
     $(document).ready(function() {
          $('#reason').change(function() {
               var selectedReason = $(this).val();
               if (selectedReason === 'Casual Leave') {
                    $('#document').closest('.form-group').hide();
               } else {
                    $('#document').closest('.form-group').show();
               }
          });
     });

     $(document).ready(function() {
          $('#fromdate, #todate').change(function() {
               var fromDate = new Date($('#fromdate').val());
               var toDate = new Date($('#todate').val());
               var differenceMs = toDate - fromDate;
               var differenceDays = Math.ceil(differenceMs / (1000 * 60 * 60 * 24));
               $('#leave_days').val(differenceDays + 1);
          });
     });
</script>
@endsection