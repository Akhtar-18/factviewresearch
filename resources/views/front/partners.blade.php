@extends('front.layout')
@section('title', 'Partners | Clients | Service Providers')
@section('frontpage')

        <!-- Breadcrumb -->
        <section class="breadcrumb">
            <div class="breadcrumb_inner report_bg bg-[#091E33] relative py-10">
                <div class="container relative h-full animate animate_top" style="--i: 1">
                    <div class="breadcrumb_content flex flex-col items-start justify-center xl:w-[1000px] lg:w-[848px] md:w-5/6 w-full h-full">
                        <h3 class="heading3 text-white mb-2">Partners</h3>
                        <div class="list_breadcrumb flex items-center gap-2">
                            <a href="{{ route('front.home') }}" class="caption1 text-white"><i class="ph ph-house"></i></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.about') }}" class="caption1 text-white"><span class="caption1 text-white">Company</span></a>
                            <span class="caption1 text-white opacity-40">/</span>
                            <a href="{{ route('front.partners') }}" class="caption1 text-white"><span class="caption1 text-white">Partners</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand -->
        @if (getClient())
        <section class="brand brand_page lg:py-14 sm:py-14 py-10">
            <div class="container">
                <h6 class="heading6 text-center">Trusted by leading enterprise organizations and freelancers globally</h6>
                <div class="mt-8">
                    <div class="list grid grid-cols-2 md:grid-cols-6">
                        @foreach (getClient() as $client)
                        <div class="brand-item relative">
                            <img src="{{ $client->image }}?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative block mx-auto" />
                        </div>
                        @endforeach
                        <!-- <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" width="136" height="49" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731121607.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="1" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120956.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="2" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120943.jpg?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="3" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731120808.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="4" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230726171114.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="5" class="duration-500 relative" />
                        </div>
                        <div class="brand-item relative">
                            <img src="https://ik.imagekit.io/0g6xszoan/clients/20230731122155.png?tr=w-136,h-49,fo-webp,cm-pad_resize" loading="lazy" alt="6" class="duration-500 relative" />
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        @endif

@endsection
