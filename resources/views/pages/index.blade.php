

@extends('layouts.master')
@section('content')
<div class="main">
    <div class="hero d-flex align-items-end">
        <div style="padding-bottom: 4rem;" class="px-5 col-lg-5">
            <h1 class="text-white fw-bolder mb-3">Big Title</h1>
            <p class="text-white pb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora, quaerat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam atque modi, harum neque laborum quos aperiam quia, ullam alias tenetur dolorem fugiat ipsum maxime mollitia? Quibusdam est amet aperiam at.</p>
            <div class="">
                <strong><a style="font-weight: bold;" href="#" class="btn btn-danger">Learn more</a></strong>
                <strong><a style="font-weight: bold;" href="{{ route("register") }}" class="btn btn-light text-danger">Register</a></strong>
            </div>
        </div>
    </div>
    {{-- <section class="container"> --}}
        <div class="row">
            <div class="col-md-5">
                <img src="./Sources/Rectangle_1296@2x.png" width="100%" height="500px" alt="" class="img-responsive">
            </div>
            <div class="col-md-7 mx-auto">
                <h2 class="text-primary fw-bold lh-base ms-4 mt-5 mb-5">ipsum dolor sit amet <br> consectetur  adipisicing elit. <br> Tempora, quaerat.</h2>
                <div class="row mx-auto ">
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
        <div class="bg-light">
            <h1 class="display-1 fw-bolder text-primary text-center mb-5 pt-5">Our Services</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 mx-5 mb-5">
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="https://www.usnews.com/dims4/USNEWS/e0809c9/2147483647/crop/2000x1313%2B0%2B0/resize/640x420/quality/85/?url=http%3A%2F%2Fmedia.beam.usnews.com%2F0d%2Fc3%2F396b0ea644d98747667d7b993ccd%2F170726-doctors-stock.jpg"
                        class="card-img-top" 
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="https://media.istockphoto.com/photos/team-of-doctors-and-nurses-in-hospital-picture-id1307543618?b=1&k=20&m=1307543618&s=170667a&w=0&h=hXpYmNYXnhdD36C-8taPQvdpM9Oj-woEdge8nvPrsZY="
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="https://s3-eu-west-1.amazonaws.com/intercare-web-public/wysiwyg-uploads%2F1580196666465-doctor.jpg"
                        class="card-img-top"
                        alt="..." text-primary text-uppercase
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="http://radiusstaffingsolutions.com/wp-content/uploads/nurse-practitioner.jpg"
                        class="card-img-top" 
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="https://s3.amazonaws.com/utep-uploads/wp-content/uploads/online-regis-college/2019/02/26044156/hc-professionals-smiling-500x333.jpg"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase ">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col bg-light">
                    <div class="card border border-0">
                    <img
                        src="https://assets.weforum.org/article/image/Xv2UsfTDCmqKcUQmaygVRjSqVVZX2S3pKtSvgdwpUGM.jpg"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title text-primary text-uppercase">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-group border" >
        <div class="card">
            <div class="card-body-1 d-inline-flex">
           <span style="color: red"><i class="fas fa-map-marker-alt fa-6x mx-3 red-text"></i></span>
            <div class="mt-2">
                <h2 class="card-title fw-bolder">Address</h2>
            <p class="card-text">
                19th Random street <br>
                East Legon, Ghana
            </p>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body-1 d-inline-flex">
           <span style="color: red"><i class="fas fa-mobile-alt fa-6x mx-3 red-text"></i></span>
            <div class="mt-2">
                <h2 class="card-title fw-bolder">Phone</h2>
            <p class="card-text">
                (233)024-343-434 <br>
                (233)024-343-434
            </p>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body-1 d-inline-flex">
           <span style="color: red"><i class="fas fa-envelope fa-6x mx-3 red-text"></i></span>
            <div class="mt-2">
                <h2 class="card-title fw-bolder">Email</h2>
            <p class="card-text">
                service@medicure.com
            </p>
            </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <h2 class="display-1 fw-bolder text-primary text-center mt-5 mb-5">Have An Issue?</h2>
        <div class="row">
            <div class="col-md-6">
                <iframe class="border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7941.121148966844!2d-0.08940577582471977!3d5.631688633669825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf8510c90603f9%3A0xc416b17a60a005f8!2sCharles%20Technology%20Africa%20Limited!5e0!3m2!1sen!2sgh!4v1638022782376!5m2!1sen!2sgh"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6 mt-5 mx-auto">
                <div class="me-5 ms-5">
                    <h2 class=" display-4 fw-bolder text-primary text-left mb-2">GET IN TOUCH WITH US</h2>
                    <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control" placeholder="Your Name" />
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                                <input type="email" id="form3Example1" class="form-control" placeholder="Your email"/>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form3Example2" class="form-control" placeholder="Phone Number" />
                            </div>
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example4" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="form-outline mb-4">
                            <textarea type="text" rows="4" id="form3Example4" class="form-control" placeholder="Your message" ></textarea>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill mb-4 fw-bolder">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    
</div>
@endsection
