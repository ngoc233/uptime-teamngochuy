@extends('layouts.index')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Project Create</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>

      </div>

    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      @include('message.errors')
        <div class="x_panel">
          <div class="x_title">
            <h2>Projects <small>Create new a project</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- form action -->
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('projects.store')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              <!-- name -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input  type="text" id="first-name" name="name"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <!--/name -->
              	
              	<!-- email -->
	            <div class="form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <textarea name="description" style="width: 100%;height: 110px"></textarea>
	                </div>
	            </div>
              	<!--/email -->
					
      			
      				 <!--sort_oder -->
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sort_oder<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="first-name" name="sort_order"  class="form-control col-md-7 col-xs-12">
                  </div>
              </div>
              <!--/sort_oder -->
      				

				      <!-- group-->
	             <div class="form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <div id="gender" class="btn-group" data-toggle="buttons">
	                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
	                      <input type="radio" name="is_active" value="1"> &nbsp; Yes &nbsp;
	                    </label>
	                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
	                      <input type="radio" name="is_active" value="0"> No
	                    </label>
	                  </div>
	                </div>
	             </div>
              	<!--/group-->
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="create" class="btn btn-success">Submit</button>
		              <button class="btn btn-primary" type="reset">Reset</button>
                  
                </div>
              </div>
            </form>
            <!-- /form action -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
