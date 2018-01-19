@extends('layouts.app')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@section('content')

    <div class="container">
        <div class="search-breadcrumb-only">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('clients.index')}}">Clients</a></li>
                        <li class="active">Add Client</li>
                    </ol>
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-body">

                        <form method="post" action="{{URL::action('ClientController@store')}}" id="clientform">

                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name" class="form-control-label">Client Name<span
                                                class="text-danger">*</span></label>
                                    <input type="text" name="name" placeholder="Enter Client Name."
                                           value="{{ old('name') }}"
                                           class="form-control" id="name" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label for="gender" class="form-control-label">Gender
                                        <span class="text-danger">*</span></label>

                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" @if(old('gender')=='Male') <?php echo 'selected' ?> @endif>
                                            Male
                                        </option>
                                        <option value="Female" @if(old('gender')=='Female') <?php echo 'selected' ?> @endif>
                                            Female
                                        </option>
                                        <option value="Others" @if(old('gender')=='Others') <?php echo 'selected' ?> @endif>
                                            Other
                                        </option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>{{--row ends here--}}


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>

                                    <input type="text" name="phone" placeholder="Enter Your Phone Number."
                                           value="{{ old('phone') }}"
                                           class="form-control" id="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label for="email">Email<span class="text-danger">*</span></label>

                                    <input type="text" name="email" placeholder="Enter your Email. for eg: example@example.com"
                                           value="{{ old('email') }}"
                                           class="form-control" id="email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>{{--row ends here--}}


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" placeholder="Enter your Address."
                                           value="{{ old('address') }}"
                                           class="form-control" id="address" required>
                                    @if ($errors->has('address'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <input type="text" name="nationality" placeholder="Enter your Nationality."
                                           value="{{ old('nationality') }}"
                                           class="form-control" id="nationality" required>
                                    @if ($errors->has('nationality'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>{{--row ends here--}}


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="date_of_birth">Date Of Birth<span class="text-danger">*</span></label>
                                    <input type="text" name="date_of_birth" placeholder="Enter your Date of Birth."
                                           value="{{ old('date_of_birth') }}" class="form-control" id="datepicker" required>
                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block text-danger">
                                            <strong>  {{ $errors->first('date_of_birth') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label for="education">Education<span class="text-danger">*</span></label>

                                    <select class="form-control" id="education" name="education" required>
                                        <option value="">Select Your Education Background</option>
                                        <option value="SLC" @if(old('education')=='SLC') <?php echo 'selected' ?> @endif>
                                            SLC
                                        </option>
                                        <option value="+2" @if(old('education')=='+2') <?php echo 'selected' ?> @endif>
                                            +2
                                        </option>
                                        <option value="Bachelor's Degree" @if(old('education')=="Bachelor's Degree") <?php echo 'selected' ?> @endif>
                                            Bachelor's Degree
                                        </option>
                                        <option value="Master's Degree" @if(old('education')=="Master's Degree") <?php echo 'selected' ?> @endif>
                                            Master's Degree
                                        </option>
                                        <option value="Doctorate or higher" @if(old('education')=="Doctorate or higher") <?php echo 'selected' ?> @endif>
                                            Doctorate or higher
                                        </option>
                                    </select>
                                    @if($errors->has('education'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('education') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>{{--row ends here--}}


                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="preferred_contact">Preferred Contact<span
                                                class="text-danger">*</span></label>

                                    <select class="form-control" id="preferred_contact" name="preferred_contact" required>
                                        <option value="">Select Your Preferred Contact</option>
                                        <option value="Email" @if(old('preferred_contact')=='Email') <?php echo 'selected' ?> @endif>
                                            Email
                                        </option>
                                        <option value="Phone" @if(old('preferred_contact')=='Phone') <?php echo 'selected' ?> @endif>
                                            Phone
                                        </option>
                                        <option value="None" @if(old('preferred_contact')=='None') <?php echo 'selected' ?> @endif>
                                            None
                                        </option>
                                    </select>
                                    @if($errors->has('preferred_contact'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('preferred_contact') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6" style="margin-top: 25px">
                                    <strong>Note: Fields with <span class="text-danger">*</span> are mandatory!</strong>

                                    <a href="{{ route('clients.index') }}" class="btn btn-danger"
                                       style="margin-left: 150px">
                                        Cancel
                                    </a>

                                    <input type="submit" class="btn btn-info pull-right" value="Add Client">
                                </div>
                            </div>{{--row ends here--}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop