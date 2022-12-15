<?php use App\Http\Controllers\dbControl; ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/supervised">
        <i class="icon-home menu-icon"></i>
        <span class="menu-title">Supervised Projects</span>
      </a>
    </li>
    
      @if(dbControl::getUsertype() == '1')
      <li class="nav-item">
        <a class="nav-link" href="/projects">
          <i class="icon-home menu-icon"></i>
          <span class="menu-title">Projects</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/users">
          <i class="icon-home menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link" href="/students">
          <i class="icon-home menu-icon"></i>
          <span class="menu-title">Students</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index">
          <i class="icon-home menu-icon"></i>
          <span class="menu-title">Index</span>
        </a>
      </li>
    
    
    </ul>
    
  </nav>