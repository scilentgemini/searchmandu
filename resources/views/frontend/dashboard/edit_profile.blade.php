@extends('frontend.frontend_dashboard')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                                        <h3>Edit Your Profile.</h3>


                                        <form action="{{ route('user.profile.store') }}" method="post" class="default-form" enctype="multipart/form-data">
                                        @csrf    
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" placeholder="{{ $userData->username }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" placeholder="{{ $userData->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="{{ $userData->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" placeholder="{{ $userData->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" placeholder="{{ $userData->address }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Default file input
                                                    example</label>
                                                <input class="form-control" name="photo" type="file" id="image" accept=".jpg, .jpeg, .png, image/heic, image/heif">
                                            </div>

                                            <div class="form-group">
                                                <img id="showImage" class="rounded-circle" style="width: 100px; height:100px" src="{{ !empty($userData->photo) ? url('upload/user_images/' . $userData->photo) : url('img/no_image.jpg') }}"
                                                alt="profile">
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

        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
    
        
        </script>

@endsection