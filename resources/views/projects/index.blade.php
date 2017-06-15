@extends('layouts.index')

@section('content')
<div class="right_col" role="main">
  <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Project <small>List</small></h3>
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
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Sort_oder</th>
                    <th>Active</th>
                    <th>Users</th>
                    <th>Created_at</th>
                    <th>Update_at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($projects as $row)
                   <tr>
                      <td>{{$row->name}}</td>
                      <td>{{$row->description}}</td>
                      <td>{{$row->sort_order}}</td>
                      <td>
                        @if($row->is_active == 1)
                            {{'Yes'}}
                        @else
                            {{'No'}}
                        @endif
                      </td>
                      <td>{{$row->User->name}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>{{$row->updated_at}}</td>
                      <td></td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
