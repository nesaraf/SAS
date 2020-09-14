

 @extends('layouts.app')

              @section('notif_amount')
               <span class="label label-danger"></span>  
            </a>
            <ul class="dropdown-menu">
              <li class="header"></li>


                <li>

                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-calendar " style="color:#ff0000;"></i> you have &nbsp<span style="color:#ff0000; text-decoration: underline;"></span>&nbsp items whit critical expiration date.
                    </a>
                  </li>
                  <li> <a href="#">
                      <i class="fa fa-battery-1"  style="color:#cc6600;"></i> &nbsp<span style="color:#cc6600; text-decoration: underline;"></span>&nbsp items whit low amount.
                    </a>
                  </li>
                  <li>
                     <a href="#">
                      <i class="glyphicon glyphicon-calendar" style="color:#cc6600;"></i> there is &nbsp<span style="color:#cc6600; text-decoration: underline;"></span>&nbsp items whit low expiration date.
                    </a>
                  </li>
                </ul>
              </li>
               @endsection

               @section('main_content')

               <style type="text/css">
                   .col-md-4{
                    padding-left: 34px;
                   }
                   .register-btn{float: right;}
               </style>
  <div class="container">
          <div class="box box-primary" style="margin-top: 20px; width:50%;">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>


                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 offset-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="empID" onchange="bringEmail(this.value)" id="name">
                                    <option>Select an employee</option>
                                    @foreach($emps as $emp)
                                    <option value="{{$emp->id}}" name="name" value="{{ old('name') }}">{{$emp->fname}}</option>
                                    @endforeach
                                </select>
                                
<!--                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>-->
<!--

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
-->
                            </div>
                        </div>

                      
<!--<div class="form-group row">-->
<!--
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="Lname" type="text" class="form-control" name="last_name"  required autofocus>
                            </div>
                        </div>

<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="Uname" type="text" class="form-control" name="user_name"  required autofocus>

                            </div>
                        </div>

<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" pattern="[700][0-9]{9}" class="form-control" name="phone"  required autofocus>
                            </div>
                        </div>
-->


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required readonly>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary register-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
         </div>



@endsection
            <script>
                function bringEmail(empid){

                   var id = empid;

                  $.ajax({
                type:'GET',
                url:'/findEmp/'+ id,
                data:'_token = {{ csrf_token()}} ',
                success:function(data){
                    const emp = data.emps;
                

                  $("#email").val(emp.email);

               }
             });
                

                }
              </script>
