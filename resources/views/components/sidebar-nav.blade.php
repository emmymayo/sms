<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/storage/{{$user->avatar}}" class="img-circle elevation-2" alt="Avatar">
          
        </div>
        <div class="info">
          <a href="#" class="d-block align-left">
          {{explode(' ',$user->name)[0].' '.explode(' ',$user->name)[1]}}
          </a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item  ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="">
              <li class="nav-item">
                <a href="/admins" class="nav-link ">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/teachers" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Students</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/students/create" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admit Student</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/students" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Students</p>
                      </a>
                    </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/sections" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>Sections</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/classes" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>Classes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/exams" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>Exams</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/exams-registration" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>Exam Registration</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/exams-entry" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>Exam Report Entry</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/subjects" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Subjects</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>