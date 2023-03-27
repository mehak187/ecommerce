<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="{{asset('/assets/img/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="../"><img src="images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="user-area dropdown float-right">
                @if (session('user'))
                     <?php $data =session()->get('user') ?> 
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2"><?php echo $data[0]->name ?></span>
                        <img class="user-avatar rounded-circle" src="<?php echo asset("myimgs/" .$data[0]->photo) ?>" alt="img">
                    </a>
                
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>
                        <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>
                        <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
                        <a class="nav-link" href="logout"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                @else
                    <li><a href="signin">Login</a></li>
                @endif
            </div>
        </div>
    </div>
</header>