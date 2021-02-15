@extends("layouts.master")

@section("content")

<!-- Start Values section -->
<section class="flex-container about-us">
    <div class="container">
        <div class="about-container">
            <div class="about-content">
                <div class="heading">
                    <h2>Who We <span> Are</span></h2>
                    <p>Best Practice Training is an independent provider of project management and IT service
                        management training courses. Since our formation in 2011, we have successfully delivered
                        training courses to both the public and private sectors throughout the UK and
                        internationally.</p>
                </div>
                <div class="heading">
                    <h2>
                        What We <span> Aim To Do</span>
                    </h2>
                    <p>We aim to have enduring relationships with our customers. Best Practice Training provides
                        authorised certification from highly reputed certification bodies. What matter to us is
                        teaching to bring real and long-lasting benefit to your work. Our main objectives is to
                        provide the highest quality of training so that you can enhance your career in your
                        industry.</p>
                </div>
                <div class="heading">
                    <h2>What Do <span> We Provide?</span> </h2>
                    <p>Best practice Training provides you with a large variety of professional courses to help
                        you develop your skills. We will help you to implement learned skills effectively in
                        your business. The variety of courses that we deliver range from Project Management,
                        Technical IT, Systems Architecture, Business Skills, Cyber Security and much more.
                    </p>
                </div>
            </div>
            <div class="about-image">
                <div class="heading">
                    <h2>Our <span>Values</span> </h2>
                    <p>Our main goal is to make a positive difference to your organisation. What you learn
                        should have a direct, lasting impact on your future at a business and personal level.
                        How do we achieve this?</p>
                </div>
                <span class="values-info">
                    <img src="{{url('img/aboutus/values-info.png')}}" alt="values-info">
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End Values section -->

<!-- Start testimonial section -->
<section class="flex-direction testimonial">
    <div class="container">
        <div class="testimonial-container">
            <div class="heading center-heading">
                <h2>What Our Clients Say <span> About Us</span></h2>
            </div>
            <div class="testimonial-content owl-carousel">
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients" />
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients">
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
                <div class="testimonial-item">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to maLorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has cke a type specimen bookunknown printer took a galley of type and
                        scramble</p>
                    <span>
                        <img src="{{url('img/aboutus/client.svg')}}" alt="clients">
                    </span>
                    <h3>Harsul Hisham</h3>
                    <p class="designation">WEB DESIGNER</p>
                    <img src="{{url('img/aboutus/stars.svg')}}" alt="stars" class="stars">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End testimonial section -->

<!-- Start skills section -->
<section class="flex-container skills">
    <div class="container">
        <div class="skills-container">
            <div class="heading center-heading">
                <h2>Why Choose Best Practice Training for <span>Your Tech Skills Needs?</span></h2>
            </div>
            <div class="skills-list">
            <div class="skills-item">
                <div class="skills-content">
                <span>
                <img src="{{url('img/aboutus/skills-verification.svg')}}" alt="varification">
                </span>
                <h3>Comprehensive curriculum, high pass rates</h3>
                <p>Whether you're looking for an individual course or a full certification programme, we offer a complete range of business and IT training, including official </p>
                </div>
            </div>
            <div class="skills-item">
               <div class="skills-content">
               <span>
                <img src="{{url('img/aboutus/skills-lesson.svg')}}" alt="lesson">
                </span>
                <h3>Virtual training and UK-wide learning centres</h3>
                <p>We offer top-quality virtual classroom and online courses so you can train wherever you are, yet get the best learning experience.We also have 20 learning centres </p>
               </div>
            </div>
            <div class="skills-item">
               <div class="skills-content">
               <span>
                <img src="{{url('img/aboutus/skills-team.svg')}}" alt="teams">
                </span>
                <h3>Award-winning training teams</h3>
                <p>Our learning professionals are among the best in the world, each with extensive experience and a proven track record of delivering the skills that transform performance.</p></div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- End skills section -->

@endsection
