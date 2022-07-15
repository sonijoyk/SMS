<div class="main-tab tab-pane " id="list" role="tabpanel">
<h5>Students</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">Reporting Teacher</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($students as $key=>$value)
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->age}}</td>
            <td>{{($value->gender == 'M')? 'Male' : 'Female'}}</td>
            <td>{{$value->teacher->name}}</td>
            <td>
              <ul class="list-inline m-0">
                <li class="list-inline-item">
                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editStudent('{{$value->id}}','{{$value->name}}','{{$value->age}}','{{$value->gender}}','{{$value->teacher->id}}')"><i class="fa fa-edit"></i></button>
                </li>
                <li class="list-inline-item">
                    <a style="color:white;" href="{{'/student/'.$value->id.'/delete'}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </li>
              </ul>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
<!-- Student Edit Modal -->
<div class="modal fade" id="studentEdit" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="#" id="editForm">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModalLabel">Edit Student</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="studentName">Name</label>
                <input type="text" class="form-control" id="studentNameEdit" name="name">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="ageEdit" name="age">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="gender">Gender</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="maleEdit" value="M">
                  <label class="form-check-label" for="male">
                   Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="femaleEdit" value="F">
                  <label class="form-check-label" for="female">
                    Female
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-outline">
                <label for="reportingTeacher">Reporting Teacher</label>
                <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="reporting_teacher" id="reportingTeacherEdit">
                  @foreach($reportingTeachers as $key=>$value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
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

<script type="text/javascript">
  
  function editStudent(id,name,age,gender,teacher){

      $("#editForm").attr('action', '/student/'+id+'/update');
      $("#studentNameEdit").val(name);
      $("#ageEdit").val(age);
      if(gender == 'M'){
        $("#maleEdit").attr('checked',true);
      }else{
        $("#femaleEdit").attr('checked',true);
      }
       $("#reportingTeacherEdit").val(teacher).change();
      $('#studentEdit').modal('toggle');
  }
</script>