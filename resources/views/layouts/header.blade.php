<!-- Header Starts -->
<header class="header" id="navbar-collapse-toggle">
  <!-- Fixed Navigation Starts -->
  <ul class="icon-menu d-none d-lg-block revealator-slideup revealator-once revealator-delay1">
    <li class="icon-box {{ active_route('home', true) }}">
      <i class="fa fa-home"></i>
      <a href="{{ route('home') }}">
        <h2>خانه</h2>
      </a>
    </li>
    <li class="icon-box {{ active_route('about', true) }}">
      <i class="fa fa-user"></i>
      <a href="{{ route('about') }}">
        <h2>درباره من</h2>
      </a>
    </li>
    <li class="icon-box {{ active_route('portfolio', true) }}">
      <i class="fa fa-briefcase"></i>
      <a href="{{ route('portfolio') }}">
        <h2>نمونه‌ کار</h2>
      </a>
    </li>
    <li class="icon-box {{ active_route('contact', true) }}">
      <i class="fa fa-envelope-open"></i>
      <a href="{{ route('contact') }}">
        <h2>ارتباط</h2>
      </a>
    </li>
    <li class="icon-box {{ active_route('blog') }}">
      {{-- <i class="fa fa-comments"></i> --}}
      <i class="fa fa-file-text"></i>
      <a href="{{ route('blog') }}">
        <h2>وبلاگ</h2>
      </a>
    </li>
  </ul>
  <!-- Fixed Navigation Ends -->
  <!-- Mobile Menu Starts -->
  <nav role="navigation" class="d-block d-lg-none">
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
      <ul class="list-unstyled" id="menu">
        <li class="{{ active_route('home', true) }}">
            <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>خانه</span></a>
        </li>
        <li class="{{ active_route('about') }}">
            <a href="{{ route('about') }}"><i class="fa fa-user"></i><span>درباره من</span></a>
        </li>
        <li class="{{ active_route('portfolio') }}">
            <a href="{{ route('portfolio') }}"><i class="fa fa-folder-open"></i><span>نمونه کار</span></a>
        </li>
        <li class="{{ active_route('contact') }}">
            <a href="{{ route('contact') }}"><i class="fa fa-envelope-open"></i><span>ارتباط با من</span></a>
        </li>
        <li class="{{ active_route('blog') }}">
            <a href="{{ route('blog') }}"><i class="fa fa-file-text"></i><span>وبلاگ</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Mobile Menu Ends -->
</header>
<!-- Header Ends -->
