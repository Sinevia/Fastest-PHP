# Fastest
The fastest PHP framework. Only 0.247 kb

1. Use "fastest.min.php" for fastest performance. 
   - Plain and vanilla PHP.
   - Check examples how to use.

2. For SEO purposes, use the files in the seo-friendly folders
   - SEO friendly URLs
   - Check examples how to use.

3. How fast is fastest:
<pre>
   BOOT RUNTIME: 2.0E-5s.
   APP RUNTIME: 8.0E-5s.
   Hello World
   TOTAL RUNTIME: 0.00011s.
</pre>

How many per second?
<a href="https://www.google.co.uk/search?q=60/0.00012&ie=utf-8&oe=utf-8&gws_rd=cr&ei=VI3KVJVoxK1Tq4eEgA4#q=60%2F0.00011" target="_blank">Check here</a>

How to use:
-------------------------
<pre>
include 'fastest.min.php';

/**
 * Route / or /?a=home
 */
function home_action(){
    return 'Hello world';
}

/**
 * Route /?a=about
 */
function about_action(){
    return 'Fastest PHP Framework';
}
</pre>
