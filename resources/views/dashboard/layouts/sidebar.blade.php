<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <span data-feather="file-text" class="align-text-bottom"></span>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/quiz-1*') ? 'active' : '' }}" href="/dashboard/quiz-1">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Quiz Matematika
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/quiz-2*') ? 'active' : '' }}" href="/dashboard/quiz-2">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Quiz Biologi
          </a>
        </li>
      </ul>
    </div>
  </nav>