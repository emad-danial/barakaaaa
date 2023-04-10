<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_umrah{{ $id }}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_umrah{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      {!! Form::open(['route'=>['umrahs.destroy',$id], 'method'=>'delete']) !!}
      <div class="modal-body">
        <h4>Delete This {{$name}}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
      	{!! Form::submit('Yes', ['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>
