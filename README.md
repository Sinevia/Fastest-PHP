# Fastest
The fastest PHP framework

1. Use "fastest.min.php" for fastest performance. 
   - Plain and vanilla PHP.
   - Examples how to use.

2. Use "faster.min.php" for human/seo friendly names.
   - Routing based on route map.
   - Examples for how to use.

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
<?php
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
?>
</pre>
