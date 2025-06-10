@extends('front.layout')
@section('title', 'FactView Research | About Us')
@section('frontpage')


        <!-- Slider -->
        <section class="slider">
            <div class="slider_inner about_slide relative lg:h-[418px] overflow-hidden bg-[#F1F6F2]">
                <div class="container flex max-sm:flex-col items-center justify-between h-full max-lg:py-16">
                    <div class="slider_content lg:w-[430px] w-full">
                        <h2 class="heading2 animate animate_top" style="--i: 1">Welcome to the Factview Research</h2>
                        <p class="body2 mt-3 animate animate_top" style="--i: 2">We at FactView Research are a top market research firm committed to proffering thorough and cutting-edge insights to companies in a variety of industries. Our goal is to become the go-to source for accurate and useful market intelligence, enabling businesses to make wise choices and stay one step ahead in the market.</p>
                        <a href="contact.php" class="button-main mt-8 animate animate_top" style="--i: 3"><i class="ph ph-chat-centered-text body1 mr-1"></i>Help Desk & Support</a>
                    </div>
                    <ul class="slider_bg h-full lg:pl-15">
                        <li class="h-full overflow-hidden about_page_img">
                            <img src="https://ik.imagekit.io/0g6xszoan/resources/about_img.png?tr=w-auto,h-800,fo-webp" width="718" height="418" alt="avatar/about1" class="w-full h-full object-cover" />
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Benefit -->
        <section class="benefit lg:py-15 sm:py-14 py-10">
            <div class="container">
                <div class="benefit_inner flex max-lg:flex-col-reverse items-start justify-between gap-y-8">
                    <div class="benefit_bg relative lg:w-5/12 sm:w-[45%] w-[85%]">
                        <img src="https://ik.imagekit.io/0g6xszoan/resources/about_img.webp?tr=w-auto,h-600,fo-webp" width="496" height="420" alt="benefit1" class="w-full rounded-20" />
                        <div class="flag_benefit flex items-center gap-3 absolute sm:top-44 top-36 lg:-right-8 -right-8 p-3 bg-white rounded-xl shadow-xl animate animate_left" style="--i: 1">
                            <span class="ph ph-chart-line-up sm:text-4xl text-3xl text-primary flex-shrink-0"></span>
                            <div class="flag_info">
                                <h6 class="heading6">1200+</h6>
                                <span class="caption1">Reports Published Annually</span>
                            </div>
                        </div>
                        <div class="flag_benefit flex items-center gap-3 absolute bottom-8 sm:left-28 left-7 p-3 bg-white rounded-xl shadow-xl animate animate_right" style="--i: 2">
                            <div class="flag_info pl-[14px] border-l-2 border-primary">
                                <h6 class="heading6">30+</h6>
                                <span class="caption1">Geography Covered</span>
                            </div>
                        </div>
                    </div>
                    <div class="benefit_content xl:w-[570px] lg:w-5/12 w-full">
                        <h3 class="heading2">About! Factview Research</h3>
                        @if ($aboutData)
                            @foreach ($aboutData as $about)
                        <p class="body2 mt-3 text-justify">
                             {!! html_entity_decode($about->content) !!}
                        </p>
                            @endforeach
                        @endif
                        <!-- <p class="body2 mt-2 animate animate_top text-justify" style="--i: 2">
                            FactView Research was formed to foster the culture of Innovation, Creativity, Transparency and to act like catalyst for business growth. We believe in transformation which help our client to look beyond the obvious and explore the untapped markets and help to create and define new segments and products, our research veteran keeps a very close watch on market changes 24*7 and its impact on overall impact on market ecosystem. 
                            <br>
                            <br>
                            Our research partners always have a first mover advantage as we are on the forefront of identifying and quantifying the new market. We just don’t work on big and disruptive technologies but also on the new and niche market which have the capability of turning into next industry revolution, we specialize in creating new revenue horizons and growth strategy. We want to foster a culture of fact based decision making and reshape the DNA of organization from merely business to big conglomerate.
                        </p>
                        <p class="body2 mt-2 animate animate_top text-justify" style="--i: 2">
                            With over 1000+ market research reports covering 20 market research areas across 25 geographies, FactViewResearch will act as a growth builder for our client’s needs. FactViewResearch has a trustworthy client from BASF, Nippon, Fujifilm, Fujitsu, AMD, bio-rad etc.
                            <br>
                            <br>
                            Recognizing profitable prospects for our clients is an integral part of our nature. Our approach centers solely on empowering them to capitalize on their genuine potential for growth. Our offerings extend beyond providing extensive studies; instead, we motivate our clients to develop astute strategies for expansion. Our research methods are meticulous, drawing on peer-driven validation, and ensuring the credibility of our insights. In essence, we chart the path to our clients' triumphs.
                        </p> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- FreelanHub features -->
        <section class="features lg:pb-15 sm:pb-14 pb-10">
            <div class="container">
                <ul class="grid lg:grid-cols-3 gap-7.5">
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 1">
                            <span class="ph ph-crosshair text-5xl"></span>
                            <strong class="heading5 mt-5">Our Mission</strong>
                            <p class="desc text-start text-secondary mt-2">FactView Research's goal is to meet each client's individual demands by providing superior market research data and analysis. We work to make it possible for companies to spot untapped potential, overcome obstacles, and develop solid growth strategies. We want to be the reliable partner that fuels business success in a market that is rapidly changing through our unwavering dedication to excellence, accuracy, and innovation.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-line rounded-xl duration-500 shadow-md hover:border-black animate animate_top" style="--i: 2">
                            <span class="ph ph-eye-closed text-5xl"></span>
                            <strong class="heading5 mt-5">Our Vision</strong>
                            <p class="desc text-start text-secondary mt-2">At FactView Research, our goal is to grow into a market research giant known for its know-how, dependability, and technological capability. We want to be the go-to place for companies looking for thorough market insights, giving them the resources they need to make data-driven decisions that will lead to long-term success and a positive influence on the world. We anticipate transforming the market research landscape and establishing new standards of excellence in the sector by utilizing the most recent technology and methodology.</p>
                        </div>
                    </li>
                    <li>
                        <div class="flex flex-col items-start h-full p-7 bg-white border-2 border-transparent rounded-xl duration-500 shadow-md hover:border-line animate animate_top" style="--i: 3">
                            <span class="ph ph-users text-5xl"></span>
                            <strong class="heading5 mt-5">Our Expert Team</strong>
                            <p class="desc text-start text-secondary mt-2">Our devoted and highly experienced staff of research professionals is the key to our success. We are able to provide thorough research services that are specifically catered to the demands of our clients thanks to the abundance of experience and industry knowledge that our researchers, analysts, and consultants possess. Our clients receive top-notch outputs that far exceed their expectations thanks to their enthusiasm for research, attention to detail, and dedication to perfection.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Testimonials -->
         @include('front.testimonial-section')

@endsection