<div class="main-tab tab-pane active" id="create" role="tabpanel">
  <h5>Add Marks</h5>
  <form method="post" action="/mark/save">
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
        <div class="form-outline">
          <label for="studentName">Student</label>
           <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="student" id="studentName">
            @foreach($students as $key=>$value)
              <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <div class="form-outline">
          <label for="term">Term</label>
          <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="term" id="term">
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
            <label for="{{$value->subject}}">{{$value->subject}}</label>
          <input type="text" class="form-control" id="{{$value->subject}}" name="marks[{{$value->id}}][]">
        </div>
      </div>
    </div>
    @endforeach


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