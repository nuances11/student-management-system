<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="{{ url('/dashboard') }}">
                        <i class="iconsmind-Shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users') }}"> 
                        <i class="iconsmind-Business-Mens"></i> Users
                    </a>
                </li>
                <li>
                    <a href="#students">
                        <i class="iconsmind-Business-ManWoman"></i> Students
                    </a>
                </li>
                <li>
                    <a href="{{ url('/schedule') }}">
                        <i class="iconsmind-Calendar-4"></i> Schedule
                    </a>
                </li>
                <li>
                    <a href="#subjects">
                        <i class="iconsmind-Books-2"></i> Subjects
                    </a>
                </li>
                <li>
                    <a href="#settings">
                        <i class="iconsmind-Gears"></i> Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            <ul class="list-unstyled" data-link="students">
                <li>
                    <a href="{{ url('/student') }}">
                        <i class="simple-icon-people"></i> Master List
                    </a>
                </li>
                <li>
                    <a href="{{ url('/student-class') }}">
                        <i class="simple-icon-people"></i> Classes
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="subjects">
                <li>
                    <a href="{{ url('/subjects') }}">
                        <i class="simple-icon-notebook"></i> Subjects
                    </a>
                </li>
                <li>
                    <a href="{{ url('/subject-assign') }}">
                        <i class="simple-icon-people"></i> Assign Subject
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="settings">
                <li>
                    <a href="{{ url('schoolyears') }}">
                        <i class="simple-icon-calendar"></i> School Year <span class="badge badge-pill badge-outline-primary float-right mr-4">{{ $active_year }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users-groups') }}">
                        <i class="simple-icon-people"></i> User Groups
                    </a>
                </li>
                <li>
                    <a href="{{ url('/sections') }}">
                        <i class="simple-icon-home"></i> Sections
                    </a>
                </li>
                <li>
                    <a href="{{ url('grades') }}">
                        <i class="simple-icon-home"></i> Grade
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="schedule">
                <li>
                    <a href="Ui.Alerts.html">
                        <i class="simple-icon-bell"></i> Alerts
                    </a>
                </li>
                <li>
                    <a href="Ui.Badges.html">
                        <i class="simple-icon-badge"></i> Badges
                    </a>
                </li>
                <li>
                    <a href="Ui.Buttons.html">
                        <i class="simple-icon-control-play"></i> Buttons
                    </a>
                </li>
                <li>
                    <a href="Ui.Cards.html">
                        <i class="simple-icon-layers"></i> Cards
                    </a>
                </li>

                <li>
                    <a href="Ui.Carousel.html">
                        <i class="simple-icon-picture"></i> Carousel
                    </a>
                </li>
                <li>
                    <a href="Ui.Charts.html">
                        <i class="simple-icon-chart"></i> Charts
                    </a>
                </li>
                <li>
                    <a href="Ui.Collapse.html">
                        <i class="simple-icon-arrow-up"></i> Collapse
                    </a>
                </li>
                <li>
                    <a href="Ui.Dropdowns.html">
                        <i class="simple-icon-arrow-down"></i> Dropdowns
                    </a>
                </li>
                <li>
                    <a href="Ui.Editors.html">
                        <i class="simple-icon-book-open"></i> Editors
                    </a>
                </li>
                <li>
                    <a href="Ui.Forms.html">
                        <i class="simple-icon-check mi-forms"></i> Forms
                    </a>
                </li>
                <li>
                    <a href="Ui.FormComponents.html">
                        <i class="simple-icon-puzzle"></i> Form Components
                    </a>
                </li>
                <li>
                    <a href="Ui.Icons.html">
                        <i class="simple-icon-star"></i> Icons
                    </a>
                </li>
                <li>
                    <a href="Ui.InputGroups.html">
                        <i class="simple-icon-note"></i> Input Groups
                    </a>
                </li>
                <li>
                    <a href="Ui.Jumbotron.html">
                        <i class="simple-icon-screen-desktop"></i> Jumbotron
                    </a>
                </li>
                <li>
                    <a href="Ui.Modal.html">
                        <i class="simple-icon-docs"></i> Modal
                    </a>
                </li>
                <li>
                    <a href="Ui.Navigation.html">
                        <i class="simple-icon-cursor"></i> Navigation
                    </a>
                </li>

                <li>
                    <a href="Ui.PopoverandTooltip.html">
                        <i class="simple-icon-pin"></i> Popover & Tooltip
                    </a>
                </li>
                <li>
                    <a href="Ui.Sortable.html">
                        <i class="simple-icon-shuffle"></i> Sortable
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="landingPage">
                <li>
                    <a target="_blank" href="LandingPage.Home.html">
                        <i class="simple-icon-docs"></i> Multipage Home
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Home.Single.html">
                        <i class="simple-icon-doc"></i> Singlepage Home
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.About.html">
                        <i class="simple-icon-info"></i> About
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Auth.Login.html">
                        <i class="simple-icon-user-following"></i> Auth Login
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Auth.Register.html">
                        <i class="simple-icon-user-follow"></i> Auth Register
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Blog.html">
                        <i class="simple-icon-bubbles"></i> Blog
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Blog.Video.html">
                        <i class="simple-icon-bubble"></i> Blog Detail
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Careers.html">
                        <i class="simple-icon-people"></i> Careers
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Confirmation.html">
                        <i class="simple-icon-check"></i> Confirmation
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Contact.html">
                        <i class="simple-icon-phone"></i> Contact
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Content.html">
                        <i class="simple-icon-book-open"></i> Content
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Docs.html">
                        <i class="simple-icon-notebook"></i> Docs
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Features.html">
                        <i class="simple-icon-chemistry"></i> Features
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Prices.html">
                        <i class="simple-icon-wallet"></i> Prices
                    </a>
                </li>
                <li>
                    <a target="_blank" href="LandingPage.Videos.html">
                        <i class="simple-icon-film"></i> Videos
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled" data-link="menu">
                <li>
                    <a href="Menu.Default.html">
                        <i class="simple-icon-control-pause"></i> Default
                    </a>
                </li>
                <li>
                    <a href="Menu.Subhidden.html">
                        <i class="simple-icon-arrow-left mi-subhidden"></i> Subhidden
                    </a>
                </li>
                <li>
                    <a href="Menu.Hidden.html">
                        <i class="simple-icon-control-start mi-hidden"></i> Hidden
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>