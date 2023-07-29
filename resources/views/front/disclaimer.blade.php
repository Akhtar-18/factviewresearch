<?php //include("header.php");?>
@extends('front.layout')
@section('title', 'Disclaimer')
@section('frontpage')

    <!-- PAGE TITLE
            ================================================== -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="{{asset('front/img/bg/bg5.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Disclaimer</h1>
                </div>
                <div class="col-md-12">
                    <ul class="ps-0">
                        <li><a href="{{ route('front.home') }}">Home</a></li>
                        <li><a href="{{ route('front.disclaimer') }}">Disclaimer</a></li>
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
                <h1>Disclaimer Policy - FactView Research</h1>
                <br/><br/>
<p>Date: 20 July, 2023</p><br/>
<p>1. Introduction:</p>
<p>Welcome to FactView Research ("we," "our," or "us"). Our website, factviewresearch.com, and the market research services we provide are intended to offer valuable insights and information to assist businesses in making informed decisions. This Disclaimer outlines the limitations of liability and disclaimers related to the use of our website and services.</p>
<p>2. Information Accuracy and Completeness:</p>
<p>While we strive to provide accurate and up-to-date information in our market research reports and on our website, FactView Research makes no warranties or representations regarding the accuracy, completeness, or reliability of the content. The market research reports and information provided on our website are for general informational purposes only and should not be considered as professional advice or an exhaustive source of information.</p>
<p>3. Not Financial or Investment Advice:</p>
<p>The market research reports and information provided by FactView Research are not intended to serve as financial, investment, or legal advice. We do not provide any financial recommendations or endorse specific investment decisions. Users are encouraged to seek professional advice and conduct their own due diligence before making any financial or investment decisions.</p>
<p>4. Non-Liability for Business Decisions:</p>
<p>FactView Research shall not be held liable for any damages or losses incurred as a result of reliance on the information presented in our market research reports or on our website. Users are solely responsible for their business decisions based on the insights provided in the reports, and FactView Research disclaims any liability arising from such decisions.</p>
<p>5. Third-Party Content:</p>
<p>Our website may include links to third-party websites, products, or services. FactView Research does not endorse or guarantee the accuracy of the content, products, or services provided by third parties. Users who access third-party websites do so at their own risk.</p>
<p>6. Limitation of Liability:</p>
<p>In no event shall FactView Research or its affiliates, partners, directors, employees, or agents be liable for any direct, indirect, incidental, consequential, or special damages, including but not limited to loss of profits, data, or business opportunities, arising from the use of our website or market research services.</p>
<p>7. Changes to Information and Services:</p>
<p>The content on our website, including market research reports, may be updated or modified periodically to reflect changes in the industry or new developments. FactView Research reserves the right to make changes to our website, services, or Terms and Conditions without prior notice.</p>
<p>8. User Conduct:</p>
<p>Users of our website and services agree to use them in compliance with applicable laws and regulations and to refrain from engaging in any activities that may harm, disrupt, or infringe upon the rights of others or our operations.</p>
<p>9. Indemnification:</p>
<p>By using our website and services, users agree to indemnify and hold FactView Research harmless from any claims, losses, liabilities, expenses, or damages arising from their use of our platform or violation of this Disclaimer.</p>
<p>10. Contact Us:</p>
<p>If you have any questions or need further information regarding this Disclaimer, please contact us at <a href="{{ route('front.about') }}"
    class="btn btn-warning medium"><span>Contact</span></a>.</p>
<p>FactView Research is committed to providing valuable market research services and information. However, users are advised to use our website and market research reports responsibly and exercise their independent judgment when making business decisions. This Disclaimer outlines the limitations of liability and the importance of seeking professional advice before acting upon the information provided. For any queries or concerns, please reach out to our team for assistance.</p>



            </div>

        </div>
    </section>


    @include('front.testimonial-section')
    @include('front.client-section')


@endsection
