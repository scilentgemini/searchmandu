@extends('frontend.frontend_dashboard')
@section('main')
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">


                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            @php
                                $id = Auth::user()->id;
                                $userData = App\Models\User::find($id);
                            @endphp


                            <div class="widget-title">
                                <h4>User Profile </h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                            <img src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('img/no_image.jpg') }}"
                                                alt="profile"></a></figure>
                                    <h5><a href="blog-details.html">{{ $userData->name }}</a></h5>
                                    <p>{{ $userData->email }}</p>
                                </div>
                            </div>
                        </div>

                        @include('frontend.dashboard.dashboard_sidebar')

                    </div>
                </div>




                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">

                                <div class="lower-content">
                                    <h3>Change Password.</h3>


                                    <form action="{{ route('user.password.update') }}" method="post" class="default-form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="old_password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password">
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="new_password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" name="new_password_confirmation" class="form-control"
                                                id="new_password_confirmation" autocomplete="off">
                                        </div>

                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Save Changes </button>
                                        </div>

                                    </form>



                                </div>
                            </div>
                        </div>


                    </div>


                </div>


            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
@endsection
