@extends('layouts.default')

@section('pageLevelPluginStyles')
  {{HTML::style('assets/global/plugins/select2/select2.css')}} 
  {{HTML::style('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}
  {{HTML::style('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}
  {{HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
  {{HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker.css')}}
@endsection

@section('themeStyles')
  {{HTML::style('assets/global/css/components.css')}}
  {{HTML::style('assets/global/css/plugins.css')}}
  {{HTML::style('assets/admin/layout/css/layout.css')}}
  {{HTML::style('assets/admin/layout/css/themes/default.css')}}
  {{HTML::style('assets/admin/layout/css/custom.css')}} 
  <!-- BEGIN CONFIRM DIALOG -->
  {{HTML::style('assets/admin/layout/jquery.confirm/jquery.confirm.css')}}
  <!-- END CONFIRM DIALOG -->
@endsection

@section('content')
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
	@if ($user->permission == 'administrator')
		@include('admin.sidebar')
	@else
		@include($user->permission . '.sidebar')
	@endif
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">     
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
      Bank Accounts Management 
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="{{URL::route('admin/home')}}">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="{{URL::route('admin/atm')}}">{{$title}}</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            {{$sub_title}}
          </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->
	@if (!is_null(Session::get('status_success')))
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert" href="#">�</a>
		@if (is_array(Session::get('status_success')))
			<ul>
			@foreach (Session::get('status_success') as $success)
				<li>{{ $success }}</li>
			@endforeach
			</ul>
		@else
			{{ Session::get('status_success') }}
		@endif
	</div>
	@endif
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <!-- BEGIN VALIDATION STATES-->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-gift"></i>{{$sub_title}}
              </div>
              <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
                <a href="javascript:;" class="remove">
                </a>
              </div>
            </div>
            <div class="portlet-body form">
              <!-- BEGIN FORM-->
			  @if ($accountByID == null)
              {{Form::open(array('url' => 'admin/account_add', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'accountAdd', 'autocomplete' => 'off'))}}
			  @else
              {{Form::open(array('url' => 'admin/account_update', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'accountAdd', 'autocomplete' => 'off'))}}
			  @endif
				<input type="hidden" name="id" id="id" value="@if($accountByID != null){{$accountByID->id}}@endif">
                <div class="form-body">
                  <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    You have some form errors. Please check below.
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Users <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-4">
                      <select class="form-control" name="user">
                        <option value=""></option>
						@foreach($users as $userinfo)
							@if ($accountByID != null && $userinfo->id == $accountByID->user_id)
							<option value="{{$userinfo->id}}" selected>{{$userinfo->fname}} {{$userinfo->lname}}</option>
							@else
							<option value="{{$userinfo->id}}">{{$userinfo->fname}} {{$userinfo->lname}}</option>
							@endif
						@endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Banks <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-4">
                      <select class="form-control" name="bank">
                        <option value=""></option>
						@foreach($banks as $bankinfo)
							@if ($accountByID != null && $bankinfo->id == $accountByID->bank_id)
							<option value="{{$bankinfo->id}}" selected>{{$bankinfo->bankName}}</option>
							@else
							<option value="{{$bankinfo->id}}">{{$bankinfo->bankName}}</option>
							@endif
						@endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Account Number <span class="required">
                    * </span>
                    </label>
                    <div class="col-md-4">
                      <select class="form-control" name="accountNumber">
                        <option value=""></option>
                        <!--
                        <option value="account_a" @if($accountByID != null && $accountByID->accountNumber == 'account_a') selected @endif>Account A</option>
                        <option value="account_b" @if($accountByID != null && $accountByID->accountNumber == 'account_b') selected @endif>Account B</option>
                        <option value="account_c" @if($accountByID != null && $accountByID->accountNumber == 'account_c') selected @endif>Account C</option>
                        <option value="account_d" @if($accountByID != null && $accountByID->accountNumber == 'account_d') selected @endif>Account D</option>
                        <option value="account_e" @if($accountByID != null && $accountByID->accountNumber == 'account_e') selected @endif>Account E</option>
                        -->
                        @foreach($accounts as $key=>$value)
                            <option value="{{$key}}" @if($accountByID != null && $accountByID->accountNumber == $key) selected @endif>{{$value}}</option>
                        @endforeach
                      </select>                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Account Name <span class="required">
                    * </span></label>
                    <div class="col-md-4">
                      <input type="text" name="accountName" data-required="1" class="form-control" value="@if($accountByID != null){{$accountByID->accountName}}@endif"/>
                    </div>
                  </div>                 
				<div class="form-actions">
				  <div class="row">
					<div class="col-md-offset-3 col-md-9">
					  <button type="submit" class="btn green">Submit</button>
					  <a href="{{URL::route('admin/accounts')}}" class="btn default">Cancel</a>
					</div>
				  </div>
				</div>
              </form>
              <!-- END FORM-->
            </div>
          </div>
          <!-- END VALIDATION STATES-->
        </div>
      </div>

      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
</div>
@endsection

@section('pageLevelPlugins')
{{HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}
{{HTML::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}
{{HTML::script('assets/global/plugins/select2/select2.min.js')}}
{{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
{{HTML::script('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
{{HTML::script('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}
{{HTML::script('assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}
{{HTML::script('assets/global/plugins/bootstrap-markdown/lib/markdown.js')}}
@endsection

@section('pageLevelScripts')
{{HTML::script('assets/global/scripts/metronic.js')}}
{{HTML::script('assets/admin/layout/scripts/layout.js')}}
{{HTML::script('assets/admin/layout/scripts/quick-sidebar.js')}}
{{HTML::script('assets/admin/layout/scripts/demo.js')}}
{{HTML::script('assets/admin/pages/scripts/form-validation.js')}}
<!-- BEGIN CONFIRM DIALOG -->
{{ HTML::script('assets/admin/layout/scripts/jquery.form.min.js') }}
{{ HTML::script('assets/admin/layout/jquery.confirm/jquery.confirm.js') }}
{{ HTML::script('assets/admin/layout/scripts/script.js') }}
<!-- END CONFIRM DIALOG -->

@endsection

@section('javaScript')
<script>
  // Delete row in a table
  var options = {
    success:  showResponse,
    dataType: 'json' 
  };

  function showResponse(response, statusText, xhr, $form)  {
    if (response.status == true) {
      $row = jQuery('.delete-row' + response.idx);
      alert(response.message);
      $row.closest('tr').fadeOut(function(){
        $row.remove();
      });
    } else {
      alert(response.message);
    }
  }

  function doDelete(id) {
    $.confirm({
      'title'   : 'Delete Confirmation',
      'message' : 'Do you really want to delete selected ATM?',
      'buttons' : {
        'Yes' : {
          'class' : 'blue',
          'action': function(){   
            jQuery('#id').val(id);
            $( '#userForm' ).ajaxForm(options).submit();           
          }
        },
        'No'  : {
          'class' : 'gray',
          'action': function(){}  // Nothing to do in this case. You can as well omit the action property.
        }
      }
    }); 
  }

jQuery(document).ready(function() {       
    // initiate layout and plugins
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    QuickSidebar.init(); // init quick sidebar
    Demo.init(); // init demo features
    FormValidation.init();
});
</script>
@endsection