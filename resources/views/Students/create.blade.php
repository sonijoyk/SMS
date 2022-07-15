<div class="main-tab tab-pane active" id="create" role="tabpanel">
  <h5 style="padding-top: 30px;">Create New Student</h5>
   <hr />  
  <form method="post" action="/student/save">
    @csrf
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="row mb-3">
      <div class="col">
        <div class="form-outline col-md-3">
          <label for="studentName">Name</label>
          <input type="text" class="form-control" id="studentName" name="name">
        </div>
      </div>
    </div>
    <div class="row mb-3">  
      <div class="col">
        <div class="form-outline col-md-3">
            <label for="age">Age</label>
          <input type="text" class="form-control" id="age" name="age">
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <div class="form-outline col-md-3">
          <label for="gender">Gender</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="M">
            <label class="form-check-label" for="male">
             Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
            <label class="form-check-label" for="female">
              Female
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <div class="form-outline col-md-6">
          <label for="reportingTeacher">Reporting Teacher</label>
          <div class="form-check">
            <select class="form-select form-select-lg  col-md-6" aria-label="Default select example" name="reporting_teacher">
              @foreach($reportingTeachers as $key=>$value)
                <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    <hr />                 
    <div class="row">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10" >
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-lg float-left">Submit</button>
          </div>
        </div>
    </div>
  </form>
</div>