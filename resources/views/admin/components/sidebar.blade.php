<aside class="sidebar">
    <div class="sidebar__backdrop"></div>
    <div class="sidebar__container">
        <div class="sidebar__top">
            <div class="container container--sm">
                <a class="sidebar__logo" href="index.html">
                    <img class="sidebar__logo-icon" src="img/content/logotype.svg" alt="#" width="44" />
                    <div class="sidebar__logo-text">arion</div>
                </a>
            </div>
        </div>
        <div class="sidebar__content" data-simplebar="data-simplebar">
            <nav class="sidebar__nav">
                <ul class="sidebar__menu">
                    <li class="sidebar__menu-item"><a class="sidebar__link " href="{{url("admin/dashboard")}}"><span class="sidebar__link-icon">
                      <svg class="icon-icon-dashboard">
                        <use xlink:href="#icon-dashboard"></use>
                      </svg></span><span class="sidebar__link-text">Dashboard</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link " href="{{url("admin/products")}}" ><span class="sidebar__link-icon">
                      <svg class="icon-icon-cart">
                        <use xlink:href="#icon-cart"></use>
                      </svg></span><span class="sidebar__link-text">Products</span><span class="sidebar__link-arrow">
                     </span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="{{url('admin/checkouts')}}" aria-expanded="false"><span class="sidebar__link-icon">
                     <svg class="icon-icon-todo">
                        <use xlink:href="#icon-todo"></use>
                      </svg></span><span class="sidebar__link-text">Checkouts</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="{{url('admin/payments')}}" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-email">
                        <use xlink:href="#icon-email"></use>
                      </svg></span><span class="sidebar__link-text">Payments</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="{{url("admin/discounts")}}" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-chat">
                        <use xlink:href="#icon-chat"></use>
                      </svg></span><span class="sidebar__link-text">Discounts</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="{{url("admin/users")}}" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-contacts">
                        <use xlink:href="#icon-contacts"></use>
                      </svg></span><span class="sidebar__link-text">Users</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="{{url('admin/types')}}" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-todo">
                        <use xlink:href="#icon-todo"></use>
                      </svg></span><span class="sidebar__link-text">Types</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="file-manager.html" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-folder">
                        <use xlink:href="#icon-folder"></use>
                      </svg></span><span class="sidebar__link-text">File Manager</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="timeline.html" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-clock">
                        <use xlink:href="#icon-clock"></use>
                      </svg></span><span class="sidebar__link-text">Timeline</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="#" data-toggle="collapse" data-target="#Auth" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-password">
                        <use xlink:href="#icon-password"></use>
                      </svg></span><span class="sidebar__link-text">Authentication</span><span class="sidebar__link-arrow">
                      <svg class="icon-icon-keyboard-down">
                        <use xlink:href="#icon-keyboard-down"></use>
                      </svg></span></a>
                        <div class="collapse" id="Auth">
                            <ul class="sidebar__collapse-menu">
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-login.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Login</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-login-v2.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Login V.2</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-login-v3.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Login V.3</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-create.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Create Account</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-create-v2.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Create Account V.2</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-create-v3.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Create Account V.3</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-lock.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Lock</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-lock-v2.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Lock V.2</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-lock-v3.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Lock V.3</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-forgot.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Forgot</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-forgot-v2.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Forgot V.2</span></a>
                                </li>
                                <li class="sidebar__menu-item"><a class="sidebar__link" href="auth-forgot-v3.html"><span class="sidebar__link-signal"></span><span class="sidebar__link-text">Forgot V.3</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="404.html" aria-expanded="false"><span class="sidebar__link-icon"></span><span class="sidebar__link-text">404</span></a>
                    </li>
                    <li class="sidebar__menu-item"><a class="sidebar__link" href="ui-kit.html" aria-expanded="false"><span class="sidebar__link-icon">
                      <svg class="icon-icon-settings">
                        <use xlink:href="#icon-settings"></use>
                      </svg></span><span class="sidebar__link-text">UI Kit</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
