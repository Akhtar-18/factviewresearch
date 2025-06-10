<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($pages as $page)
    <url>
        <loc>{{ url($page) }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($reportsCategory as $reportcate)
    <url>
        <loc>{{ route('front.reports')}}?id={{gerenaretslug(strtolower($reportcate->cat_name))}}</loc>
        <lastmod>{{ $reportcate->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($reports as $report)
    <url>
        <loc>{{ url('/') }}/report/{{ $report->url }}</loc>
        <lastmod>{{ $report->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    @endforeach

    @foreach ($services as $service)
    <url>
        <loc>{{ url('/') }}/services/{{ $service->slug }}</loc>
        <lastmod>{{ $service->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($blogs as $blog)
    <url>
        <loc>{{ url('/') }}/services/{{ $blog->url }}</loc>
        <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($casestudies as $casestudy)
    <url>
        <loc>{{ url('/') }}/case-study/{{ $casestudy->url }}</loc>
        <lastmod>{{ $casestudy->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach


    @foreach ($pressReleases as $press)
    <url>
        <loc>{{ url('/') }}/press-release/{{ $press->url }}</loc>
        <lastmod>{{ $press->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

</urlset>