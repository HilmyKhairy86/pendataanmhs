<!-- {{-- <html data-theme="cupcake"> --}} -->
    
    <div data-theme="cupcake" class="navbar bg-base-100">
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
              <!-- Page content here -->
              <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label>
            </div>
            <div class="drawer-side">
              <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
              <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
                <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label>
                <li><a>Profile</a></li>
                <li><a>Kelas</a></li>
              </ul>
            </div>
            </div>
        {{-- <div class="flex-1">
          <a for="my-drawer" class="btn btn-primary drawer-button">Dashboard</a>
        </div> --}}
        <div class="flex-none gap-2">
          <div class="form-control">
            <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
          </div>
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img
                  alt="Tailwind CSS Navbar component"
                  src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
              </div>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      