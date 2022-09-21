@extends('layouts.main')

@section('content')
    <!-- Developer Info  -->
    <div class="row justify-content-center align-items-center py-3">
        <div class="col-10 col-lg-4 mb-5">
            <div class="text-center">
                <div class="">
                    <img src="{{ asset('images/about.jpg') }}" class="img-fluid" alt="">
                </div>

                <div class="d-flex justify-content-center"> 
                    <span class="ml-3 mt-3">
                        <a href="https://www.facebook.com/v.lain.01/" target="_blank" title="Facebook" class="text-primary text-decoration-none">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                    </span>
                    
                    <span class="ml-3 mt-3">
                        <a href="https://github.com/dev-wy-k" title="GitHub" target="_blank" class="text-primary text-decoration-none">
                            <i class="fab fa-github fa-2x"></i>
                        </a>
                    </span>
                    
                    <span class="ml-3 mt-3">
                        <a href="https://www.linkedin.com/in/wai-yan-kyaw-dev/" target="_blank" title="LinkIn" class="text-primary text-decoration-none">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                    </span>
                    
                    <span class="ml-3 mt-3">
                        <a href="https://dev-wy-k.github.io/Portfolio/" target="_blank" title="Website" class="text-primary text-decoration-none">
                            <i class="fas fa-globe-asia fa-2x"></i>
                        </a>
                    </span>

                </div>
            </div>            
        </div>

        <div class="col-12 col-lg-8 mb-5">
            <h2 class="text-primary font-weight-bold">
                <span class="text-white h4">Hello ! I'm</span>
                Wai Yan Kyaw
            </h2>

            <p class="text-white my-3 my-md-5">
                I'm Learning Web Development for 1+ years ago and developed profile landing page and the most user-friendly website. <br>
                This website is also developed with tmdb API and using laravel backend service, a little thing to do with user experience (UX) for alpine js and livewire. <br>
                I want to create many projects for client needs so do you have to need something about the website? <br>  
            </p>

            <a href="https://t.me/dev_wyk" target="_blank" class="btn btn-primary text-white">You Can Hire Me!</a>
            
        </div>
    </div>
    <!-- Developer Info End  --> 
       
@endsection

