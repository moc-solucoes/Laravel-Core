<div class="pcoded-inner-navbar main-menu">
    <div class="">
        <div class="main-menu-header">
            <img class="img-menu-user img-radius" src="{{asset('images/avatar-default.png')}}"
                 alt="User-Profile-Image">
            <div class="user-details">
                <p id="more-details">{{user()->nome}}
                <!--<i class="feather icon-chevron-down m-l-10"></i>--></p>
            </div>
        </div>
        <div class="main-menu-content">

        </div>
    </div>

    <ul class="pcoded-item pcoded-left-item">
        <li class="">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-home"></i>
                </span>
                <span class="pcoded-mtext">Inicio</span>
            </a>
        </li>
        <li class="pcoded-hasmenu" subitem-icon="style1" dropdown-icon="style1">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
       <span class="pcoded-micon">
           <i class="feather icon-layers"></i>
       </span>
                <span class="pcoded-mtext">Outros</span>
            </a>
            <ul class="pcoded-submenu" style="display: none;">
                <li class="">
                    <a href="https://mocsolucoes.com.br" target="_blank" class="waves-effect waves-dark">
               <span class="pcoded-mtext">
                   <i class="fa fa-code"></i> MOC Soluções
               </span>
                    </a>
                </li>
                <li class="">
                    <a href="http://mocfidelidade.com.br" target="_blank" class="waves-effect waves-dark">
               <span class="pcoded-mtext">
                   <i class="fa fa-list"></i> MOC Fidelidade
               </span>
                    </a>
                </li>
                <li class="">
                    <a href="http://mocspeak.net" target="_blank" class="waves-effect waves-dark">
               <span class="pcoded-mtext">
                   <i class="fa fa-microphone"></i> MOC Teamspeak
               </span>
                    </a>
                </li>
                <li class="">
                    <a href="http://odonto.mocsolucoes.com.br" target="_blank" class="waves-effect waves-dark">
               <span class="pcoded-mtext">
                   <i class="fa fa-user-md"></i> MOC Odonto
               </span>
                    </a>
                </li>
            </ul>
        </li>
        @include('Auth::_user_menu_admin')
        <li class="">
            <a href="{{route('usuario.logout')}}" class="waves-effect waves-dark">
       <span class="pcoded-micon">
           <i class="feather icon-log-out"></i>
       </span>
                <span class="pcoded-mtext">Sair</span>
            </a>
        </li>
    </ul>
</div>
