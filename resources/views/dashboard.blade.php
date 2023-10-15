@extends('frontend.frontend_dashboard')
@section('main')
    {{-- <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>User Profile </h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>User Profile </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title--> --}}


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

                        <!--DashboardSidebar-->
                    @include('frontend.dashboard.dashboard_sidebar')

                    </div>
                </div>



            </div>
        </div>
    </section>

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
@endsection
