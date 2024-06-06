   <!-- Perlu styling Activenya, error. -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <script src="https://kit.fontawesome.com/a01e79832b.js" crossorigin="anonymous"></script>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user())
            @if(Auth::user()->id_role ==1) 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-gauge mr-1"></i>
                <p>
                  Dashboard
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dashboard2" class="nav-link">
                    <i class="fa-regular fa-circle mr-1"></i>
                    <p>
                      Data warehouse
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dashboard" class="nav-link">
                    <i class="fa-regular fa-circle mr-1"></i>
                    <p>
                      Data
                    </p>
                  </a>
                </li>
              </ul>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-book mr-1"></i>
                <p>
                  Books
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/kategori" class="nav-link">
                    <i class="fa-solid fa-filter mr-1"></i>
                    <p>
                      Category
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/books" class="nav-link">
                    <i class="fa-solid fa-gear mr-1"></i>
                    <p>
                      Book Setting
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/books-list" class="nav-link">
                    <i class="fa-solid fa-list mr-1"></i>
                    <p>
                      Book List
                    </p>
                  </a>
                </li>
              </ul>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-box-archive mr-1"></i>
                  <p>
                    Rent
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/rentlog" class="nav-link">
                      <i class="fa-solid fa-clock-rotate-left mr-1"></i>
                      <p>
                        Rent Log
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/book-rent" class="nav-link">
                      <i class="fa-solid fa-hand-holding-hand mr-1"></i>
                      <p>
                        Book Rent
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/book-return" class="nav-link">
                      <i class="fa-solid fa-rotate-left mr-1"></i>
                      <p>
                        Book Return
                      </p>
                    </a>
                  </li>
                </ul>
                <li class="nav-item">
                  <a href="/users" class="nav-link">
                    <i class="fa-regular fa-user mr-1"></i>
                    <p>
                      Users
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/books-user3" class="nav-link">
                    <i class="fa-solid fa-code-pull-request mr-1"></i>
                    <p>
                      Book Request
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/logout" class="nav-link">
                    <i class="fa-solid fa-right-from-bracket mr-1"></i>
                    <p>
                      Logout
                    </p>
                  </a>
                </li>
            @else
          
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-book mr-1"></i>
                <p>
                  Books
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/books-list" class="nav-link">
                    <i class="fa-solid fa-list mr-1"></i>
                    <p>
                      Book List
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/books-request" class="nav-link">
                    <i class="fa-solid fa-code-pull-request mr-1"></i>
                    <p>
                      Book Request
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/books-user" class="nav-link">
                    <i class="fa-solid fa-clock-rotate-left mr-1"></i>
                    <p>
                      Book Log
                    </p>
                  </a>
                </li>
              </ul>

              <li class="nav-item">
                <a href="/logout" class="nav-link">
                  <i class="fa-solid fa-right-from-bracket mr-1"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
            @endif
          @else
          <li class="nav-item">
            <a href="/books-list" class="nav-link">
              <i class="fa-solid fa-list mr-1"></i>
              <p>
                 Book List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/login" class="nav-link">
              <i class="fa-solid fa-right-to-bracket mr-1"></i>
              <p>
                 Login
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Layanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
        </ul> --}}
      </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>