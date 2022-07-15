<div class="main-tab tab-pane " id="list" role="tabpanel">
<h5>Students</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          @foreach($subjects as $key=>$value)
            <th scope="col">{{$value->subject}}</th>             
          @endforeach
          <th scope="col">Term</th>
          <th scope="col">Total Mark</th>
          <th scope="col">Created On</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($studentMarks as $key=>$value)
          @php $total = 0; $marks = [];  @endphp
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->student->name}}</td>
            @foreach($subjects as $subKey=>$subValue)
              @foreach($value->studentTermMarks as $markKey=>$markValue)
                @if($markValue->subject_id == $subValue->id)

                  <td scope="col">{{$markValue->mark}}</td> 
                  @php 
                      $marks[$markValue->subject_id] = $markValue->mark; 
                      $total = $total+$markValue->mark;  
                  @endphp
                @endif
              @endforeach          
            @endforeach

            <td>{{$value->term->term}}</td>
            <td>{{$total}}</td>
            <td>{{date("F j, Y, g:i a",strtotime($value->created_at)); }}</td>
            <td>
              <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editMarks('{{$value->id}}','{{$value->term->id}}','{{$value->student->name}}','{{json_encode($marks)}}')"><i class="fa fa-edit"></i></button>
                </li>
                <li class="list-inline-item">
                    <a style="color:white;" href="{{'/studentTerm/'.$value->id.'/delete'}}"  class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </li>
              </ul>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

<!-- Mark Edit Modal -->
<div class="modal fade" id="markEdit" tabindex="-1" aria-labelledby="marksModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="#" id="editForm">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="marksModalLabel">Edit Marks</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="studentName">Name</label>
                <input type="text" class="form-control" id="studentNameMarkEdit" name="name" readonly>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="age">Term</label>
                <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="term" id="termEdit">
                  @foreach($terms as $key=>$value)
                    <option value="{{$value->id}}">{{$value->term}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="Subjects">Subjects</label>          
              </div>
            </div>
           
          </div>
         @foreach($subjects as $key=>$value)
          <div class="row mb-3">  
            <div class="col">
              <div class="form-outline col-md-3">
                  <label for="markSubject{{$value->id}}">{{$value->subject}}</label>
                <input type="text" class="form-control" id="markSubject{{$value->id}}" name="marks[{{$value->id}}][]">
              </div>
            </div>
          </div>
        @endforeach
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  
  function editMarks(primaryId,id,name,subjects){

      $.each(JSON.parse(subjects) , function( k, v ) {
        $("#markSubject"+k).val(v);
      });
      $("#editForm").attr('action', '/studentTerm/'+primaryId+'/update');
      $("#studentNameMarkEdit").val(name);
      $("#termEdit").val(id).change();
      $('#markEdit').modal('toggle');
  }
</script>