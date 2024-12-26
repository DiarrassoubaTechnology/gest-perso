<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('page.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Tableau de bord</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('page.team.chat')}}" aria-expanded="false">
                        <i data-feather="message-square" class="feather-icon"></i>
                        <span class="hide-menu">Messagerie</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('page.team.rdv')}}" aria-expanded="false">
                        <i data-feather="calendar" class="feather-icon"></i>
                        <span class="hide-menu">Nos RDV</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('page.appoint.report')}}" aria-expanded="false">
                        <i data-feather="file" class="feather-icon"></i>
                        <span class="hide-menu">Mes Rapoorts </span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Heures de travail</span></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="clock" class="feather-icon"></i><span
                        class="hide-menu">Pointage </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{route('page.appoint.hour')}}" class="sidebar-link"><span
                                    class="hide-menu"> Pointer heure
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('page.appoint.history')}}" class="sidebar-link">
                            <span class="hide-menu"> Historique </span>
                        </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('page.general.statistic')}}" aria-expanded="false">
                    <i data-feather="bar-chart" class="feather-icon"></i>
                    <span class="hide-menu">Controller Statistique</span></a>
                </li>
                
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i data-feather="sun" class="feather-icon"></i><span
                        class="hide-menu">Congés </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{route('page.leave.list')}}" class="sidebar-link"><span
                                    class="hide-menu"> Demande de congé
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('page.leave.justify')}}" class="sidebar-link">
                            <span class="hide-menu"> Justification absent </span>
                        </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Employés</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('page.worker.add')}}" aria-expanded="false">
                    <i data-feather="user-plus" class="feather-icon"></i><span
                        class="hide-menu">Nouveau
                    </span></a>
                </li>
                
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('page.worker.list')}}" aria-expanded="false">
                    <i data-feather="users"
                        class="feather-icon"></i><span class="hide-menu">Liste
                    </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Projets</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false">
                        <i data-feather="layers" class="feather-icon"></i>
                        <span class="hide-menu">Liste des projets </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="authentication-register1.html" aria-expanded="false">
                        <i data-feather="folder" class="feather-icon"></i>
                        <span class="hide-menu">Affecter les projets </span>
                    </a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="check-square" class="feather-icon"></i><span
                            class="hide-menu">Nos Tâches
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><span
                                    class="hide-menu"> En cours </span></a></li>

                        <li class="sidebar-item"><a href="icon-simple-lineicon.html" class="sidebar-link"><span
                                    class="hide-menu"> Terminé </span></a></li>

                        <li class="sidebar-item"><a href="icon-simple-lineicon.html" class="sidebar-link"><span
                                    class="hide-menu"> Suspendu </span></a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->