@extends('front.layout')
@section('title', 'Terms And Conditions')
@section('frontpage')

    <!-- PAGE TITLE
                ================================================== -->
    <section class="page-title-section pt-1-9 pb-1-9 bg-primary">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.terms') }}" class="text-white">Terms And Conditions</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- ABOUT
                ================================================== -->
    <section class="md">
        <div class="container">

            <div class="ps-lg-1-9">
                <h1>Terms And Conditions Policy - FactView Research</h1>
                <br /><br />
                <p>Date: 20 July, 2023</p><br />
                <p>1. Introduction:

                <p>Welcome to FactView Research ("we," "our," or "us"). By accessing or using our website,
                    factviewresearch.com, and our market research services, you agree to abide by the following Terms and
                    Conditions. These Terms govern your use of our website, purchase of market research reports or services,
                    and interactions with FactView Research.</p>

                <p>2. Intellectual Property:</p>

                <p>All content, materials, and intellectual property on our website, including market research reports,
                    graphics, logos, and trademarks, are the exclusive property of FactView Research and protected by
                    applicable copyright and trademark laws. You may not reproduce, distribute, or modify any content
                    without our prior written consent.</p>

                <p>3. Use of Services:</p>

                <p>You may use our website and services for lawful purposes only and agree not to engage in any activities
                    that may harm, disrupt, or infringe upon the rights of others or our operations. You are responsible for
                    ensuring the accuracy and completeness of any information you provide to us.</p>

                <p>4. Market Research Reports and Services:</p>

                <p>Our market research reports and services are intended for informational purposes only. The insights and
                    data provided in these reports are based on rigorous research and analysis. However, the information may
                    not be exhaustive or error-free. We recommend using the reports as part of your decision-making process
                    and seeking professional advice if required.</p>

                <p>5. Payment and Pricing:</p>

                <p>By purchasing our market research reports or services, you agree to pay the specified amount as per the
                    pricing mentioned on our website. Payments can be made through secure payment gateways provided on our
                    platform. All prices are in [insert currency] and subject to change without prior notice.</p>

                <p>6. Refund Policy:</p>

                <p>Please refer to our separate Refund Policy for information regarding refunds for market research reports
                    or services.</p>

                <p>7. Privacy Policy:</p>

                <p>Our Privacy Policy outlines how we collect, use, and protect your personal information. By using our
                    website or services, you agree to the practices described in the Privacy Policy.</p>

                <p>8. Third-Party Links:</p>

                <p>Our website may contain links to third-party websites for your convenience. We do not endorse or control
                    the content or practices of these websites and are not responsible for any damages or losses resulting
                    from your interactions with third-party sites.</p>

                <p>9. Limitation of Liability:</p>

                <p>FactView Research and its affiliates, partners, directors, employees, and agents shall not be liable for
                    any direct, indirect, incidental, consequential, or special damages arising from the use of our website
                    or market research services, including but not limited to loss of profits, data, or business
                    opportunities.</p>

                <p>10. Indemnification:</p>

                <p>You agree to indemnify, defend, and hold FactView Research harmless from any claims, losses, liabilities,
                    expenses, or damages arising from your use of our website or services or your violation of these Terms
                    and Conditions.</p>

                <p>11. Termination:</p>

                <p>We reserve the right to terminate or suspend your access to our website and services at any time without
                    prior notice, for any reason, including if you violate these Terms and Conditions.</p>

                <p>12. Amendments to the Terms and Conditions:</p>

                <p>FactView Research may update these Terms and Conditions from time to time. Any significant changes to the
                    Terms will be communicated to you through our website or email.</p>

                <p>13. Contact Us:</p>

                <p>If you have any questions or need further assistance regarding our Terms and Conditions, please contact
                    us at <a href="{{ route('front.about') }}" class="btn btn-warning medium"><span>Contact</span></a>.</p>

                <p>By using our website and market research services, you agree to comply with these Terms and Conditions.
                    We encourage you to read these Terms carefully to understand your rights and obligations when using our
                    platform. FactView Research is dedicated to providing valuable market insights and a seamless user
                    experience. For any inquiries or clarifications, please reach out to our team for assistance.</p>



            </div>

        </div>
    </section>


    @include('front.testimonial-section')
    @include('front.client-section')


@endsection
