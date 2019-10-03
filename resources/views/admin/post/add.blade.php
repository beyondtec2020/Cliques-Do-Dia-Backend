@extends('layouts.dashboard')
@section('sub-title')

@stop
@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('content')	
<section class="content-header"><h1>Listing </h1>
<a href="#" type="button" class="pull-right btn  btn-info btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b> Back </b> </a>
</section><br>
<section class="content">
       <div class="row">
      <div class="col-xs-12 ">
        <div class="box box-info">
            <div class="box-header with-border blue">
              <h3 class="box-title "><i class="fa fa-plus"></i><strong> Add-List</strong></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-9 col-sm-offset-2">@include('errors.errors')</div>

             <form action="{{url('/save-lists-user')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {{csrf_field()}}

            <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Title :</label>
                  <div class="col-sm-9">
                  <input type="text" name="title" class="form-control"  required="">
                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Short Description :</label>
                  <div class="col-sm-9">
                  <input type="text" name="short_description" class="form-control" required="">
                  {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    Category :</label>
                  <div class="col-sm-9">
                    <select name="catgory" class="form-control has-error" required>
                      <option value="">Select category</option>
                      @foreach($category as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                    </select>
                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label"> Address :</label>
                  <div class="col-sm-9">
                    <input type="text" name="address" class="form-control" required>
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label">
                    City :</label>
                  <div class="col-sm-9">
                    <select name="city" class="form-control has-error" required>
                        <option value="">Select city</option>
                        @foreach($city as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2  control-label"> Zip-Code :</label>
                  <div class="col-md-9">
                  <input type="text" name="zip_code" class=" form-control"  required>
                    {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2 control-label"> Phone Number :</label>
                  <div class="col-md-9">
                  <input type="text" name="phone" class="form-control"  required>
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Email <span>(optional)</span></label>
                  <div class="col-md-9">
                  <input type="text" name="email" class="form-control">
                    </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Website <span>(optional)</span></label>
                  <div class="col-md-9">
                  <input type="text" name="website" class="form-control">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Facebook <span>(optional)</span></span></label>
                  <div class="col-md-9">
                  <input type="text" name="facebook" class="form-control">
                  </div>
                </div>

                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Linkdin <span>(optional)</span></label>
                  <div class="col-md-9">
                  <input type="text" name="linkdin" class="form-control ">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2  control-label"> Twitter <span>(optional)</span></span></label>
                  <div class="col-md-9">
                  <input type="text" name="twitter" class="col-sm-12 form-control">
                  </div>
                </div>
                <div class="form-group ">
                  <label for="" class="col-sm-2 control-label"> Google Plus <span>(optional)</span></label>
                  <div class="col-md-9">
                  <input type="text" name="google" class="form-control">
                  </div>
                </div>

              <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="" class="col-sm-2  control-label">Description :</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="description" rows="8"></textarea>
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Amenities <span>(optional)</span></label><br>
                <div class=" col-sm-8">
                  <div class="checkbox" style="margin-left: 20px;">
                  <?php $i=1; $j=1; ?>
                  @foreach($Amenity as $k => $data)
                      <p><input type="checkbox" id="amenities{{++$k}}" name="amenities[{{$j++}}]" value="{{$data->id}}" >
                      <label for="amenities{{$i++}}">{{$data->name}}</label></p>
                  @endforeach
                  </div>
                </div>
              </div>


                <div class="form-inline ">
                  <label for="" class="col-sm-2  control-label"> Min. Price</label>
                  <input type="text" name="min_price" class="col-sm-4 form-control"  style="margin-left: 5px;" min="0">
                  {!! $errors->first('min_price', '<p class="help-block">:message</p>') !!}  
                </div>

                <div class="form-inline {{ $errors->has('max_price') ? 'has-error' : ''}}">
                  <label for="" class="col-sm-2 control-label"> Max. Price</label>
                  <input type="text" name="max_price" class="form-control col-sm-4 "  min="0">
                  {!! $errors->first('max_price', '<p class="help-block">:message</p>') !!}
                </div>
                <br><br><br>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Youtube Video URL </label>
                <div class="col-sm-9">
                <input type="text" name="video" class="form-control" >
                <code>Only embeded code supported</code>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Google Location </label>
                <div class="col-sm-9">
                <input type="text" name="location" class="form-control" >
                <code>Only embeded code supported</code>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-2  control-label">Add Gallery Images </label>
                <div class="col-sm-9">
                <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple required />
                </div>
                {!! $errors->first('images', '<p class="help-block" style="color: red">:message</p>') !!}
                
                 <div id="image_preview" class="col-sm-offset-3" style="margin-top: 10px;"></div>
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <button class="btn btn-lg btn-primary btn-block " type="submit">
                  <i class="fa fa-paper-plane"></i> <strong>  Add Listing </strong>
              </button>
            </div>
            </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</section>
@stop


@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>

<script src="{{asset('public/assets/admin/js/jquery.form.js')}}"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
   bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
@stop
    	