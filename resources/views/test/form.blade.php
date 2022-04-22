@if(count($bookings)>0)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <form method="post" action="{{route('test')}}">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Test Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">

            <input type="hidden" name="id_booking" value="{{$booking->id}}"> 
            
            <div class="form-group">
                <label for="">Test Result</label>
                <input type="text" name="test_result" class="form-control" required="">
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endif

