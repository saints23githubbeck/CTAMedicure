

@extends('layouts.master')
@section('content')
<div class="main">
    <div class="hero d-flex align-items-end">
        <div style="padding-bottom: 4rem;" class="px-5 col-lg-5">
            <h1 class="mb-3">BIG TITLE</h1>
            <p class="pb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, quaerat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam atque modi, harum neque laborum quos aperiam quia, ullam alias tenetur dolorem fugiat ipsum maxime mollitia? Quibusdam est amet aperiam at.</p>
            <div class="">
                <strong><a style="font-weight: bold;" href="#" class="btn btn-danger">Learn more</a></strong>
                <strong><a style="font-weight: bold;" href="{{ route("register") }}" class="btn btn-light text-danger">Register</a></strong>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="./Sources/Rectangle_1296@2x.png" height="100%" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 mx-auto">
                <h2 class="text-primary mt-5 mb-5">ipsum dolor sit amet <br> consectetur  adipisicing elit. <br> Tempora, quaerat.</h2>
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="iconAndText d-inline-flex">
                            <i class="fas fa-desktop fa-4x mx-3"></i>
                            <p class="mb-2"> <span class="text-primary">User focused</span> <br>We alway keep the end user in mind when creating any design</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="iconAndText d-inline-flex">
                                <i class="fas fa-tags fa-4x mx-3"></i>           
                            <p class="mb-2"> <span class="text-primary">User focused</span> <br>We alway keep the end user in mind when creating any design</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="iconAndText d-inline-flex">
                                <i class="fas fa-assistive-listening-systems fa-4x mx-3"></i>
                            <p class="mb-2"> <span class="text-primary">User focused</span> <br>We alway keep the end user in mind when creating any design</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <div class="iconAndText d-inline-flex">
                                <i class="fas fa-crown fa-4x mx-3"></i>
                            <p class="mb-2"> <span class="text-primary">User focused</span> <br>We alway keep the end user in mind when creating any design</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ourService">
        <h1 class="text-center mt-5 mb-5">Our Services</h1>
        <div class="row d-flex justify-content-around mx-auto">
            <div class="col-md-4 ourServiceImg" style="width: 25rem;">
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="70%" alt="" class="m-3 img-fluid ">
                <p>
                    <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
            <div class="col-md-4 ourServiceImg" >
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="70%" alt="" class="m-3 img-fluid ">
                <p>
                <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
            <div class="col-md-4 ourServiceImg" >
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="70%" alt="" class="m-3 img-fluid ">
                <p>
                <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
        </div>
        <div class="row d-flex justify-content-around mx-5">
            <div class="col-md-4 ourServiceImg" >
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="70%" alt="" class="m-3 img-fluid ">
                <p>
                <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
            <div class="col-md-4 ourServiceImg">
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="70%" alt="" class="m-3 img-fluid ">
                <p>
                <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
            <div class="col-md-4 ourServiceImg">
                <img src="./Sources/Rectangle_1296@2x.png"  alt="" class="m-3 img-fluid ">
                <p>
                <h4>jfhjghjhghjrhjrjgjhjjh</h4>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ex suscipit aliquid ab necessitatibus accusantium? Sed cum consequuntur quo earum dolores ullam iusto minima repudiandae tempora. Mollitia culpa quidem natus?
                </p>
            </div>
        </div>
    </section>
    
</div>
@endsection
