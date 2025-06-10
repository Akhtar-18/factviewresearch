@extends('front.layout')
@section('title', 'Refund')
@section('frontpage')

    <!-- PAGE TITLE ================================================== -->
    <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Refund Policy</h3>
                        <div class="list_breadcrumb flex items-center gap-2 animate animate_top" style="--i: 1">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Company</span>
                            <span class="caption1 text-white opacity-40">/</span>
                            <span class="caption1 text-white opacity-40">Refund Policy</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- ABOUT ================================================== -->
    <section class="md">
        <div class="container">

            <div class="ps-lg-1-9">
                <h3 class="heading2">Refund Policy - FactView Research</h3>
                <br /><br />
                <p>Date: 20 July, 2023</p><br />
                <p>1. Introduction:</p>

                <p> At FactView Research, we take pride in delivering high-quality market research services to our valued
                    clients. We strive to provide accurate and valuable insights to help you make informed business
                    decisions. However, we understand that situations may arise where a refund is necessary. This Refund
                    Policy outlines our guidelines and procedures regarding refund requests for our market research reports
                    and services.</p>

                <p>2. Refund Eligibility:</p>

                <p>We offer refunds in the following scenarios:</p>

                <p><strong>Duplicate Purchases:</strong> If you accidentally purchase the same market research report or
                    service more than once, we will refund the duplicate transaction upon verification.</p>

                <p>Inaccurate or Incomplete Reports: In the rare event that a market research report you purchased contains
                    significant inaccuracies or incomplete information, we will offer a full refund or a replacement report,
                    based on your preference.</p>

                <p> Service Cancellation by FactView Research: If, for any reason, we are unable to fulfill your order or
                    provide the requested service, you will receive a full refund.</p>

                <p>3. Refund Request Procedure:</p>

                <p>To initiate a refund request, follow these steps:</p>

                <p>Step 1: Contact Us: Reach out to our customer support team through [insert contact information] within
                    [insert number of days] from the date of purchase or delivery of the service. Provide your order details
                    and a brief explanation of the reason for the refund request.</p>

                <p>Step 2: Evaluation: Our team will thoroughly evaluate your request and verify the eligibility for a
                    refund based on the criteria mentioned in this policy.</p>

                <p>Step 3: Resolution: If your refund request meets the eligibility criteria, we will process the refund
                    within [insert number of days] from the date of approval. The refund will be issued to the original
                    payment method used for the purchase.</p>

                <p>4. Non-Refundable Cases:</p>

                <p>Refunds will not be provided in the following scenarios:</p>

                <p>Change of Mind: We do not offer refunds for market research reports or services due to a change of mind
                    or if you later decide that the report or service is not suitable for your specific needs.</p>

                <p>Partial Utilization: If you have partially utilized the report or service, a refund will not be issued
                    for the portion that has been used.</p>

                <p>5. Disputes and Chargebacks:</p>

                <p>In the event of a refund dispute or chargeback initiated by the customer without first contacting our
                    customer support, we reserve the right to suspend access to our services until the dispute is resolved.
                </p>

                <p>6. Amendments to the Refund Policy:</p>

                <p>FactView Research may update this Refund Policy from time to time. Any significant changes to the policy
                    will be communicated to you through our website or email.</p>

                <p>7. Contact Us:</p>

                <p>If you have any questions or need further assistance regarding our refund policy, please contact our
                    customer support team at <a href="{{ route('front.about') }}"
                        class="btn btn-warning medium"><span>Contact</span></a>.</p>

                <p>FactView Research is committed to ensuring customer satisfaction and providing reliable market research
                    services. We offer refunds under specific circumstances to address any issues related to duplicate
                    purchases or inaccuracies in our reports. Our refund policy is designed to be fair and transparent while
                    prioritizing your needs as our valued client. For any refund-related queries or concerns, please feel
                    free to reach out to our customer support team.</p>



                <p>If you have any questions, concerns, or requests regarding this Refund or our data practices, please
                    contact us at <a href="{{ route('front.about') }}"
                        class="btn btn-warning medium"><span>Contact</span></a>.</p>

                <p>At FactView Research, we are committed to maintaining the privacy and security of your personal
                    information. We value your trust and strive to be transparent about our data practices. This Refund
                    outlines how we handle your data, ensuring a safe and seamless user experience when you visit our
                    website or use our market research services. If you have any questions or concerns, please feel free to
                    reach out to us.</p>


            </div>

        </div>
    </section>


    @include('front.testimonial-section')


@endsection
