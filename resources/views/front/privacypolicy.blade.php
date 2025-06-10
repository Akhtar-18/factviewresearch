@extends('front.layout')
@section('title', 'Privacy Policy')
@section('frontpage')

    <!-- PAGE TITLE ================================================== -->
    <!-- <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.privacy-policy') }}" class="text-white">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section> -->
     <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Privacy Policy</h3>
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Company</span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Privacy Policy</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- ABOUT
                        ================================================== -->
    <section class="md">
        <div class="container">

            <div class="ps-lg-1-9">
                <h3 class="heading2">Privacy Policy - FactView Research</h3>
                <!-- <h1>Privacy Policy - FactView Research</h1> -->
                <br /><br />
                <p>Date: 20 July, 2023</p><br />
                <p>1. Introduction:</p>

                <p>Welcome to <strong>FactView Research</strong> ("we," "our," or "us"). As a market research organization,
                    we are committed to protecting your privacy and ensuring the security of your personal information. This
                    Privacy Policy outlines how we collect, use, disclose, and safeguard the data we gather from users of
                    our website, factviewresearch.com, and our market research services. By accessing or using our website
                    or services, you consent to the practices described in this Privacy Policy.</p>

                <p>2. Information We Collect:</p>

                <p>We may collect various types of information from users, including:</p>

                <p>Personal Information: This may include your name, email address, contact number, job title, and company
                    name when you voluntarily provide this information while subscribing to our newsletters or requesting
                    our services.</p>

                <p>Non-Personal Information: We may collect non-personal information, such as IP addresses, browser type,
                    operating system, and referring URLs, which are automatically collected as you interact with our
                    website.</p>

                <p>3. How We Use Your Information:</p>

                <p>We use the information we collect for the following purposes:</p>

                <p>To provide and improve our market research services and website functionality.</p>
                <p>To personalize your experience on our website and tailor content to your interests.</p>
                <p>To send you updates, newsletters, and promotional materials about our services and industry insights (you
                    may opt-out at any time).</p>
                <p>To respond to your inquiries, comments, or requests for information.</p>
                <p>To analyze website usage and trends to enhance our offerings and user experience.</p>
                <p>4. Data Sharing and Disclosure:</p>

                <p>We do not sell, trade, or rent your personal information to third parties. However, we may share your
                    information under the following circumstances:</p>

                <p>With service providers and partners who assist us in providing our services and improving our website
                    (e.g., website hosting, analytics).</p>
                <p>With your consent, when you explicitly agree to the sharing of your information.</p>
                <p>To comply with legal obligations or respond to lawful requests and protect our rights, safety, and
                    property.</p>
                <p>5. Data Security:</p>

                <p>We implement industry-standard security measures to protect your information from unauthorized access,
                    alteration, disclosure, or destruction. However, no method of data transmission over the internet or
                    electronic storage is entirely secure, and we cannot guarantee the absolute security of your data.</p>

                <p>6. Cookies and Similar Technologies:</p>

                <p>Our website may use cookies and similar technologies to enhance your browsing experience, analyze website
                    traffic, and collect user information. You have the option to disable cookies through your browser
                    settings, but this may affect certain features of the website.</p>

                <p>7. Third-Party Links:</p>

                <p>Our website may contain links to third-party websites for your convenience. Please note that we are not
                    responsible for the privacy practices or content of those sites. We encourage you to review the privacy
                    policies of any third-party websites you visit.</p>

                <p>8. Children's Privacy:</p>

                <p>Our services are not intended for children under the age of 13. We do not knowingly collect personal
                    information from individuals under 13 years of age. If you believe that we may have collected
                    information from a child under 13, please contact us, and we will promptly take appropriate action.</p>

                <p>9. Updates to the Privacy Policy:</p>

                <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for legal
                    reasons. We will notify you of any significant changes through the email address provided or prominent
                    notice on our website.</p>

                <p>10. Contact Us:</p>

                <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices,
                    please contact us at <a href="{{ route('front.about') }}"
                        class="btn btn-warning medium"><span>Contact</span></a>.</p>

                <p>At FactView Research, we are committed to maintaining the privacy and security of your personal
                    information. We value your trust and strive to be transparent about our data practices. This Privacy
                    Policy outlines how we handle your data, ensuring a safe and seamless user experience when you visit our
                    website or use our market research services. If you have any questions or concerns, please feel free to
                    reach out to us.</p>


            </div>

        </div>
    </section>


    @include('front.testimonial-section')

@endsection
