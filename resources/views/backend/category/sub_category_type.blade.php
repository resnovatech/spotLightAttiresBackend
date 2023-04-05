@extends('backend.master.master')

@section('title')
Add Form |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Add Form</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Grid Layout</h4>

                <form>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">First name</label>
                        <input type="text" class="form-control track" id="first_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Last name</label>
                        <input type="text" class="form-control track" id="last_name" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">City</label>
                                <input type="text" class="form-control track" id="city" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">State</label>
                                <select id="formrow-inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="formrow-inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="formrow-inputZip">
                            </div>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
    </div>
    <div class="col-sm-4">
        <div class="">
            <div>
                <span class='meter' style="display:inline-block;background:yellow;color:green;width:0;height:20px"></span>
                <span class='perc'>0</span>%
              </div>
            {{-- <div class="progress">
                <div class="progress-bar meter"  role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div> --}}

            <ul>
                <li id="first_namel">First Name</li>
                <li id="last_namel">Last Name</li>
                <li id="cityl">City</li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $('.track').change(function(e) {
  update_progress();
});

$('#first_name').change(function(e) {

    $('#first_namel').css('color', 'green');

});

$('#last_name').change(function(e) {

$('#last_namel').css('color', 'green');

});

$('#city').change(function(e) {

$('#cityl').css('color', 'green');

});

// supports any number of inputs and calculates done as %
function update_progress() {
  var count = $('.track').length;
  var length = $('.track').filter(function() {
    return this.value;
  }).length;
  var done = Math.floor(length * (100 / count));
  $('.perc').text(done);
//   $('.meter').text(done);
  $('.meter').width(done);
}
</script>
@endsection
