@extends("layouts.master")
@section("content")

<!-- Start Banner Section -->
<section class="flex-container banner offer-banner">
    <div class="container">
        @include("layouts.navbar")
        <div class="banner-container">
            <h1>Bundle Offer</h1>
            <p>Best Practice Training provides different exciting training bundles, which will enhance your knowledge and add-on to your skills. We provide training bundles at a lower price in the marketplace.</p>
            <div class="breadcrums">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><img src="{{url('img/master/breadcrum-arrow.svg')}}" alt="arrow" class="white"></li>
                    <li><a href="">Offer</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- Start bundle section -->
<section class="flex-container bundle">
    <div class="container">
        <div class="bundle-container">
            <div class="range">
                <div class="heading">
                    <h2>We Offer a Wide Range <span>of Bundles</span></h2>
                </div>
                <p>Best Practice Training offers you the desired professional training courses in just a single package, which helps to build skills and grow more effectively in professional life. Our training bundle courses are specially designed by our highly experienced trainers who hold years of experience in their respected fields. Our highly demanded course bundles helped many individuals to get their desired job.</p>
                <p>Our bundles also help individuals to gain new or upgrade their existing skills and knowledge. Our popular training bundles helps to take your skills to the next level. Following are the categories in which we mainly provide the bundles:</p>
                <div class="bundle-list">
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our Project Management Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our Business Analysis Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our ITIL Bundles</h3>
                </div>
                <div class="project-bundle">
                    <span><img src="{{url('img/offer/project-bundle.svg')}}" alt="project-bundle"></span>
                    <h3>Our IT Security Bundles</h3>
                </div>
                </div>
                <div class="buttons open-popup enquiryJS"  data-type="bundle" data-quote="Need Help" data-heading="Need Help">
                    <a class="btn-blue"><img src="{{url('img/offer/enquire.svg')}}" alt="enquire">Need Help</a>
                </div>
                </div>
                <div class="top-bundles">
                    <div class="heading">
                        <h2>Customer Buying Training in Bundles</h2>
                    </div>
                    <div class="bundles-info">
                    <img src="{{url('img/offer/top-bundles.svg')}}" alt="top-bundles">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End bundle section -->

<!-- Start management section -->
<section class="flex-container management">
    <div class="container">
        <div class="management-container">
            <div class="heading center-heading">
                <h2>Our Project <span>Management Bundles</span></h2>
            </div>
            <div class="management-bundles">
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>PRINCE2® & Agile Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                        <li>AgilePM® Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="PRINCE2® & Agile Bundle" data-heading="PRINCE2® & Agile Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Project & Programme Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                        <li>MSP Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS" data-quote="Project & Programme Bundle"  data-type="bundle" data-heading="Project & Programme Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>  
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Programme and Change Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>MSP Foundation & Practitioner</li>
                        <li>Change Management Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Programme and Change Bundle" data-heading="Programme and Change Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Gold Government Standard Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation</li>
                        <li>Praxis Bridging</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS" data-quote="Gold Government Standard Bundle"   data-type="bundle" data-heading="Gold Government Standard Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Platinum Government Standard Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                        <li>Praxis Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Platinum Government Standard Bundle" data-heading="Platinum Government Standard Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>The Complete Project Manager Starter Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation</li>
                        <li>Agile Foundation</li>
                        <li>APM PFQ</li>
                        <li>MSP Foundation</li>
                        <li>Change Management Foundation</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="The Complete Project Manager Starter Bundle" data-heading="The Complete Project Manager Starter Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>  
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>The Complete Project Manager Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                        <li>Change Management Foundation & Practitioner</li>
                        <li>APM PMQ</li>
                        <li>Scrum Master</li>
                        <li>MSP Foundation</li>
                        <li>Agile Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="The Complete Project Manager Bundle" data-heading="The Complete Project Manager Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Professional Project Manager</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                        <li>Agile Foundation & Practitioner</li>
                        <li>Scrum Master</li>
                        <li>PMP Certification</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Professional Project Manager" data-heading="Professional Project Manager">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Project Manager Career Starter Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li> PRINCE2® Foundation & Practitioner</li>
                        <li>APM PMQ</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="Project Manager Career Starter Bundle" data-heading="Project Manager Career Starter Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Project Manager Career Building Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>APM PMQ</li>
                        <li>Praxis Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Project Manager Career Building Bundle" data-heading="Project Manager Career Building Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Create your own Project Management Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Create your own Project Management Bundle" data-heading="Create your own Project Management Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="management-container">
            <div class="heading center-heading">
                <h2> Our Business Analysis  <span>Bundles</span></h2>
            </div>
            <div class="management-bundles">
                <div class="bundle-info">
                    <div class="bundle-content">
                        <h3>Business Analysis Diploma Bundle</h3>
                        <span>Up to 15% off with this bundle</span>
                        <ul>
                            <li>What does the Diploma consist of?</li>
                            <li>Business Analysis Practice</li>
                            <li>Business Analysis Requirements Engineering</li>
                            <li>Business Analysis Modelling Business Processes</li>
                            <li>BCS Oral Exam Workshop</li>
                        </ul>
                        <a href="javascript:void(0);">Plus one of the four listed below</a>
                        <div class="buttons">
                            <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Business Analysis Diploma Bundle" data-heading="Business Analysis Diploma Bundle">
                                    <img src="{{url('img/offer/email.svg')}}" alt="email">
                                    Get a Quote
                            </a>
                        </div>
                    </div>
                     <!-- <div class="bundle-click">
                        <ul>
                            <li>BCS Commercial Awareness</li>
                            <li>Foundation Certificate in Business Analysis</li>
                            <li>Foundation Certificate in Business Change</li>
                            <li>Foundation Certificate in IS Project Management</li>   
                        </ul>
                    </div> -->
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Business Analysis & PRINCE2® Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>Business Analysis Practice</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Business Analysis & PRINCE2® Bundle" data-heading="Business Analysis & PRINCE2® Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>  
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Business Analysis & Change Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>Business Analysis Practice</li>
                        <li>Change Management Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="Business Analysis & Change Bundle" data-heading="Business Analysis & Change Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Business Analysis & PM Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>Business Analysis Practice</li>
                        <li>P3O Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Business Analysis & PM Bundle" data-heading="Business Analysis & PM Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Business Analysis & Improvement Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>Business Analysis Practice</li>
                        <li>Lean Six Sigma Green Belt</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="Business Analysis & Improvement Bundle" data-heading="Business Analysis & Improvement Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Business Analysis & Praxis Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>Business Analysis Practice</li>
                        <li>Praxis Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Business Analysis & Praxis Bundle" data-heading="Business Analysis & Praxis Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>  
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Create your own Business Analysis Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="The Complete Project Manager Bundle" data-heading="The Complete Project Manager Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="management-container">
            <div class="heading center-heading">
                <h2>Our ITIL <span>Bundles</span></h2>
            </div>
            <div class="management-bundles">
                <div class="bundle-info">
                   <div class="bundle-content">
                        <h3>ITIL Expert Bundle</h3>
                        <span>Up to 15% off with this bundle</span>
                        <ul>
                            <li>What does ITIL Expert include?</li>
                            <li>WITIL Foundation</li>
                            <li>ITIL Continual Service Improvement</li>
                            <li>ITIL Managing Across the Lifecycle</li>
                        </ul>
                        <a href="javascript:void(0);">ITIL Service Lifecycle Path</a>
                        <a href="javascript:void(0);">ITIL Service Capability Path</a>
                        <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="ITIL Expert Bundle" data-heading="ITIL Expert Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                    <!-- <div class="bundle-click">
                        <ul>
                            <li>ITIL Service Operation</li>
                            <li>ITIL Service Transition</li>
                            <li>Foundation Certificate in Business Change</li>
                            <li>ITIL Service Design</li>
                            <li>ITIL Service Strategy</li>
                        </ul>
                    </div>
                    <div class="bundle-click">
                        <ul>
                            <li>ITIL Service Offerings & Agreements</li>
                            <li>ITIL Release, Control & Validation</li>
                            <li>ITIL Planning, Protection & Optimization</li>
                            <li>ITIL Operational Support & Analysis</li>
                        </ul>
                    </div> -->
                    
                </div>
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>ITIL & PRINCE2® Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>ITIL Foundation</li>
                        <li>PRINCE2® Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="ITIL & PRINCE2® Bundle" data-heading="ITIL & PRINCE2® Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>  
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>ITIL & TOGAF® Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>ITIL Foundation</li>
                        <li>TOGAF® 9 Training Course: Combined (level 1 & 2)</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="ITIL & TOGAF® Bundle" data-heading="ITIL & TOGAF® Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>ITIL & Software Testing Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>ITIL Foundatione</li>
                        <li>ISTQB Software Testing Foundation</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="ITIL & Software Testing Bundle" data-heading="ITIL & Software Testing Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>TIL & MSP Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>ITIL Foundation</li>
                        <li>MSP Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="TIL & MSP Bundle" data-heading="TIL & MSP Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>ITIL & Praxis Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>ITIL Foundation</li>
                        <li>Praxis Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle"  data-quote="ITIL & Praxis Bundle" data-heading="ITIL & Praxis Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>  
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Create your own Business Analysis Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle"  data-quote="The Complete Project Manager Bundle" data-heading="The Complete Project Manager Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="management-container">
            <div class="heading center-heading">
                <h2> Our IT Security  <span>Bundles</span></h2>
            </div>
            <div class="management-bundles">
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Cyber Security Professional Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses Included</li>
                        <li>CISSP Certified Information Systems Security Professional</li>
                        <li>CISM Certified Information Security Manager</li>
                        <li>CISA Certified Information Systems Auditor</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="Cyber Security Professional Bundle" data-heading="Cyber Security Professional Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
                <div class="bundle-info">
                    <div class="bundle-content">
                    <h3>Information Security Professional Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>CISSP Certified Information Systems Security Professional</li>
                        <li>CISM Certified Information Security Manager</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle" data-quote="Information Security Professional Bundle" data-heading="Information Security Professional Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                    </div>
                </div>  
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Data Protection Professional Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>CISSP Certified Information Systems Security Professional</li>
                        <li>EU GDPR General Data Protection Regulation Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Data Protection Professional Bundle" data-heading="Data Protection Professional Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
                <div class="bundle-info">
                   <div class="bundle-content">
                   <h3>Data Protection Professional Bundle</h3>
                    <span>Up to 15% off with this bundle</span>
                    <ul>
                        <li>Courses included</li>
                        <li>CISSP Certified Information Systems Security Professional</li>
                        <li>EU GDPR General Data Protection Regulation Foundation & Practitioner</li>
                    </ul>
                    <div class="buttons">
                        <a class="btn-blue open-popup enquiryJS"   data-type="bundle"  data-quote="Data Protection Professional Bundle" data-heading="Data Protection Professional Bundle">
                                <img src="{{url('img/offer/email.svg')}}" alt="email">
                                Get a Quote
                        </a>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End management section -->

<!-- Start recommend section -->
<section class="flex-container recommend">
    <div class="container">
        <div class="recommend-container">
            <div class="heading white-heading">
                <h2>Stay in Touch</h2>
            </div>
            <div class="recommend-info">
                <p>Get personalised course recommendations and courses with reminders to get the latest information about the courses and offers. Do you know the courses you want but not when or where you want to take them? We will help you.</p>
                <!-- <input type="text" name="email" id="email" placeholder="Your Email Address" autocomplete="off"> -->
                <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Enquire Now" data-heading="Enquire Now"><img src="{{url('img/offer/email.svg')}}" alt="email">
                    Enquire Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End recommend section -->

<!-- Start new-bundle section -->
<section class="flex-container new-bundle">
    <div class="container">
        <div class="new-container">
    <div class="info-us">
    <img src="{{url('img/offer/inform-bg.png')}}" alt="inform-bg">
            <div class="info-content">
                <p>Need more information on Bundles? We're a click away</p>
                <div class="info-list">
                    <div class="info-list">
                    <span>
                        <img src="{{url('img/offer/telephone.svg')}}" alt="call us">
                    </span>
                    <div class="info">
                        <p>Call Us:</p>
                        <a href="tel:{{websiteDetail()->contact_number}}">{{websiteDetail()->contact_number}}</a>
                    </div>
                    </div>
                <div class="info-list">
                    <span>
                        <img src="{{url('img/offer/mail.svg')}}" alt="mail">
                    </span>
                    <div class="info">
                        <p>Email Us:</p>
                        <a href="mailto:{{websiteDetail()->contact_email}}">{{websiteDetail()->contact_email}}</a>
                    </div>
                    </div>
                </div>
                    </div>
    </div>
    <div class="latest-bundles">
        <div class="heading">
        <h2>New Bundles To Begin 2021</h2>
        </div>
        <p>Enquire Now and Be the First to Grab the Opportunity</p>
        <p>By filling out the Enquiry form, you will be the first one to grab our opportunity. Wanted to buy several courses in a single package? We offer an in-hand developed bundle of trending courses to provide you with the best way to gain the necessary knowledge and skills to succeed in your career. We value your precious time and money.</p>
        <p>Our bundles give you a discounted price for purchasing multiple courses at once – you could save up to 50%. Our new course bundles provide the best way to get the most value for your money. Each bundle features a range of professional training courses designed to provide you with the skills to succeed.</p>
            <div class="buttons">
        <a class="btn-blue open-popup enquiryJS"  data-type="bundle"  data-quote="Have any Question?" data-heading="Have any Question?"><img src="{{url('img/offer/question.svg')}}" alt="question">Have any Question?</a>
            </div>
    </div>
        </div>
    </div>
</section>
<!-- End new-bundle section -->

<!-- Start pass section -->
<section class="flex-container pass">
    <div class="container">
        <div class="pass-container">
            <div class="heading center-heading white-heading">
                <h2>Our Training Passes</h2>
            </div>
            <div class="pass-list">
                <div class="pass-content">
                    <div class="pass-heading">
                        <span><img src="{{url('img/offer/id-card.svg')}}" alt="id-card"></span>
                        <h3>FlexiPass</h3>
                    </div>
                    <p>FlexiPass is a pre-paid training voucher that enables you to book and attend the training programmes anywhere within 6 months. Having agreed with your training provider on the financial issues involved, you will be provided with an account to book your course. Besides, you will also come to know about the performance of others through various reports you receive.</p>
                    <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Enquire For The FlexiPass" data-heading="Enquire For The FlexiPass"><img src="{{url('img/offer/quote.svg')}}" alt="quote">Enquire For The FlexiPass</a>
                    </div>
                </div>
                <div class="pass-content">
                    <div class="pass-heading">
                        <span><img src="{{url('img/offer/id-card.svg')}}" alt="id-card"></span>
                        <h3>Knowledge Pass</h3>
                    </div>
                    <p>Knowledge Pass is also a pre-paid training voucher that helps you maintain your training budget more effectively. After setting a budget, you can book any course in your preferred location within 12 months. This pass is best suited for the audience who have flexible requirements for the business. To get the knowledge pass, you can contact one of our specialist learning consultant to set up your account so that you can book courses throughout the year.</p>
                    <div class="buttons">
                    <a class="btn-blue open-popup enquiryJS"  data-type="bundle" data-quote="Enquire For The Knowledge Pass" data-heading="Enquire For The Knowledge Pass"><img src="{{url('img/offer/quote.svg')}}" alt="quote">Enquire For The Knowledge Pass</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End pass section -->

@endsection