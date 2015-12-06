<?php
$home = env('BH_HOME');
?>

<footer>
  <div class="container">
    <div class="logo-row row">
      <a href="{{ $home }}"><img class="footer-logo" src="/images/logo-80.png"></a>
    </div>
    <div class="bh-row row">
      <a href="{{ $home }}">BOB HUMPHREY</a>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div><a href="{{ $home }}">Bob Humphrey</a></div>
        <div><a href="{{ $home }}">Web Development</a></div>
      </hr>
    </div>
    <div class="col-md-3">
      <div class="footer-title footer-title-top">WORK</div>
      <a href="http://photography.bobhumphrey.org/">Tumblr Photos</a><br>
    </div>
    <div class="col-md-3">
      <div class="footer-title footer-title-top">PROGRAMMING</div>
      <a href="{{ $home }}/programming/ebooks.html">Ebooks</a><br>
      <a href="{{ $home }}/programming/online-resources.html">Online Resources</a><br>
    </div>
    <div class="col-md-3">
      <div class="footer-title footer-title-top">REFERENCE</div>
      <a href="{{ $home }}/reference/object-oriented.html">Object Oriented PHP</a><br>
      <a href="{{ $home }}/reference/website-deployment.html">Website Deployment</a><br>
    </div>
  </div>
</div>
</footer>




<!--
blade - {{ $home}}
ejs - <%= home %>
-->
