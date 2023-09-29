<div class="propel-main-container">
    <div class="propel-menu-bar">
        <div class="propel-brand-container ">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Propel Brand Image" class="propel-logo-image">
            <div class="propel-brand">
                <p class="propel-brand-name">Propel Soft</p>
                <p class="propel-caption">Accelerating Business Ahead</p>
            </div>
        </div>
        <ul class="propel-menu-bar-list-container user-menu-bar propel-display-menu-bar">
            {{-- <p class="propel-menu-bar-title">User</p> --}}
            <a href="">
                <li class="account">
                    <svg width="15" height="15" viewBox="0 0 15 15">
                        <path
                            d="M5.25 0H1.5C0.671573 0 0 0.671573 0 1.5V5.25C0 6.07843 0.671573 6.75 1.5 6.75H5.25C6.07843 6.75 6.75 6.07843 6.75 5.25V1.5C6.75 0.671573 6.07843 0 5.25 0Z" />
                        <path opacity="0.3"
                            d="M13.5 0H9.75C8.92157 0 8.25 0.671573 8.25 1.5V5.25C8.25 6.07843 8.92157 6.75 9.75 6.75H13.5C14.3284 6.75 15 6.07843 15 5.25V1.5C15 0.671573 14.3284 0 13.5 0Z" />
                        <path opacity="0.3"
                            d="M13.5 8.25H9.75C8.92157 8.25 8.25 8.92157 8.25 9.75V13.5C8.25 14.3284 8.92157 15 9.75 15H13.5C14.3284 15 15 14.3284 15 13.5V9.75C15 8.92157 14.3284 8.25 13.5 8.25Z" />
                        <path opacity="0.3"
                            d="M5.25 8.25H1.5C0.671573 8.25 0 8.92157 0 9.75V13.5C0 14.3284 0.671573 15 1.5 15H5.25C6.07843 15 6.75 14.3284 6.75 13.5V9.75C6.75 8.92157 6.07843 8.25 5.25 8.25Z" />
                    </svg>

                    &nbsp;&nbsp; <span class='propel-menu-bar-text'> My Account</span>
                </li>
            </a>
            <a href="">
                <li class="profile"><svg width="16" height="16" fill="currentColor"
                        class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                    </svg>&nbsp;&nbsp; <span class='propel-menu-bar-text'> My Profile</span></li>
            </a>
            <a href="">
                <li class="change-password">
                    <svg width="15" height="15" viewBox="0 0 15 15">
                        <path
                            d="M9.53004 0.0368233C8.49991 0.218003 7.60954 0.699423 6.88482 1.46038C5.77186 2.63028 5.35774 4.22984 5.75633 5.79316L5.87539 6.25387L2.93511 9.17345L0 12.0982V13.4959V14.8884H1.39767H2.79534V13.9566V13.0248H3.72712H4.6589V12.093V11.1612H5.59068H6.52246V10.2295V9.29768H7.34036H8.15825L8.44297 8.95603C8.71732 8.61438 9.36439 8.08637 9.72675 7.90001C9.83028 7.84825 10.1357 7.73436 10.4049 7.64119C10.8656 7.48071 10.9432 7.47036 11.6214 7.46518C12.3979 7.46518 12.724 7.52213 13.2934 7.77578L13.5885 7.90519L13.7852 7.6826C14.2304 7.1753 14.5927 6.48681 14.7791 5.80351C14.9085 5.34279 14.9344 4.3489 14.8412 3.80536C14.6704 2.85287 14.22 2.01427 13.4901 1.2999C12.9 0.725306 12.284 0.378476 11.4143 0.130001C10.9898 0.0109402 9.9597 -0.0408251 9.53004 0.0368233ZM11.1555 1.91591C11.5903 2.0298 11.9682 2.25757 12.3254 2.61475C12.8482 3.14276 13.0812 3.74324 13.0346 4.45243C12.9828 5.24962 12.4703 5.93292 11.9216 5.93292C11.7404 5.93292 11.6628 5.8708 10.3945 4.60255C8.92439 3.1324 8.88297 3.08064 9.03309 2.6924C9.26604 2.08156 10.3221 1.69332 11.1555 1.91591Z" />
                        <path
                            d="M11.3101 8.51978C10.6785 8.62331 10.0677 8.92355 9.58112 9.38426C8.89781 10.0313 8.60792 10.6732 8.56134 11.6309C8.54063 12.1071 8.55098 12.2262 8.67004 12.6248C8.79946 13.0596 9.14111 13.686 9.33782 13.8516C9.42064 13.9138 9.42582 13.862 9.42582 13.1114V12.3038H10.3058C11.16 12.3038 11.1859 12.309 11.1393 12.4022C11.1082 12.454 10.9891 12.573 10.8753 12.6662C10.632 12.8577 10.6216 12.9302 10.8131 13.0803C11.1703 13.365 11.7915 13.4634 12.2833 13.3184C12.8682 13.1528 13.3393 12.5937 13.4428 11.9518L13.4791 11.7344H13.8052C14.121 11.7344 14.1365 11.7396 14.1365 11.8587C14.1365 12.0709 13.8932 12.7801 13.7327 13.0286C13.2927 13.717 12.4955 14.1053 11.6259 14.0483C11.0875 14.0121 10.896 13.95 10.4818 13.6756L10.1402 13.4427L9.99524 13.5462C9.91242 13.6032 9.77783 13.7429 9.68983 13.8516L9.53453 14.0483L9.6743 14.1829C10.0418 14.5298 10.6993 14.8248 11.4084 14.9439C11.9934 15.0474 12.9355 14.83 13.4946 14.4676C14.121 14.0587 14.7473 13.2097 14.9026 12.5627C15.1407 11.5688 14.9389 10.58 14.3332 9.76733L14.1624 9.53438L14.1365 10.3368L14.1106 11.1391L13.2461 11.1546C12.7647 11.1598 12.3765 11.1495 12.3765 11.1288C12.3765 11.1081 12.4955 10.9683 12.6456 10.8182C12.9045 10.5542 12.9096 10.5438 12.8216 10.4455C12.5214 10.1142 11.6932 9.98474 11.1651 10.1815C10.6113 10.3937 10.192 10.9113 10.1195 11.4859L10.0832 11.7344H9.75712H9.42582V11.5636C9.42582 11.2012 9.63288 10.668 9.90724 10.2953C10.1247 10.0055 10.6268 9.63791 10.9581 9.52921C11.3204 9.41015 12.1746 9.39462 12.5162 9.49815C12.6353 9.53438 12.8941 9.66897 13.0856 9.79839L13.4325 10.0313L13.7327 9.73109L14.033 9.43603L13.8932 9.29109C13.3445 8.75272 12.1383 8.39036 11.3101 8.51978Z" />
                    </svg>



                    &nbsp;&nbsp; <span class='propel-menu-bar-text'> Change Password</span>
                </li>
            </a>
            <a href="">
                <li class="default-login"><svg width="15" height="17" viewBox="0 0 15 17">
                        <path
                            d="M10.105.195c-.862.223-1.733.951-2.106 1.769-.16.338-.196.578-.196 1.262 0 .755.027.898.258 1.333.986 1.91 3.44 2.31 4.95.809.622-.622.88-1.253.88-2.142A3.138 3.138 0 0 0 12.158.418c-.507-.25-1.538-.356-2.053-.223Zm2.017 1.964c.365.205.213.534-.684 1.494-.48.515-.924.906-1.013.906-.178 0-1.067-.88-1.173-1.155-.08-.214.16-.534.4-.534.097 0 .32.134.488.285l.294.293.648-.693c.658-.702.738-.747 1.04-.596Zm-8.141.214c-.56.257-1.022.977-1.022 1.59 0 .471.383 1.138.818 1.422.409.267 1.075.33 1.555.143.57-.214 1.085-.97 1.093-1.591 0-.436-.328-1.049-.737-1.369-.276-.222-.427-.275-.889-.293-.338-.018-.649.018-.818.098ZM.649 6.008c-.4.266-.649.71-.649 1.164 0 .266.453 1.448 1.75 4.586.97 2.32 1.84 4.363 1.938 4.541.098.178.329.409.516.515.328.178.435.187 3.981.187 3.342 0 3.662-.009 3.822-.16.266-.222.32-.55.133-.835-.364-.551-1.777-2.195-1.964-2.284-.124-.063-.88-.098-1.964-.098-1.707 0-1.76-.009-2.213-.231-.258-.125-.542-.347-.64-.48-.098-.142-.72-1.564-1.378-3.155A188.5 188.5 0 0 0 2.64 6.55c-.338-.711-1.342-.987-1.991-.542Z" />
                        <path
                            d="M5.315 6.06c-.64.294-.934.765-.934 1.476 0 .285.214.898.836 2.382.462 1.093.889 2.08.96 2.186.248.4.542.454 2.684.454h2l1.199 1.501c.649.818 1.28 1.565 1.395 1.645.285.195.774.177 1.12-.036.356-.213.516-.702.373-1.155-.133-.454-2.8-3.742-3.19-3.928-.249-.134-.551-.16-1.555-.16H8.957l-.213-.516c-.115-.275-.222-.56-.249-.622-.035-.08.24-.107 1.2-.107 1.218 0 1.253-.009 1.52-.23.213-.178.275-.303.275-.543 0-.755-.346-.915-2.008-.915H8.265l-.649-.622c-1.022-.97-1.555-1.156-2.301-.81Z" />
                    </svg>

                    &nbsp;&nbsp; <span class='propel-menu-bar-text'> Default Login</span></li>
            </a>
            <!-- <li>Raguram</li>
                <li>Vallatharsu</li>
                <li>Lokeshwari</li>
                <li>Consulting</li> -->
        </ul>
        <ul class="propel-menu-bar-list-container person-master-menu-bar  ">
            {{-- <p class="propel-menu-bar-title">Organisation</p> --}}
            <a href="{{ url('salutation') }}">
                <li class="salutation">
                    <i class="fas fa-user"></i> 
                    <span class='propel-menu-bar-text'>Salutation</span>
                </li>
            </a>
            
            <a href="{{ url('gender') }}">
                <li class="gender">
                    <i class="fas fa-venus-mars"></i>
                    <span class='propel-menu-bar-text'>Gender</span>
                </li>
            </a>
            <a href="{{ url('documentType') }}">
                <li class="personDocumentType">
                    <i class="far fa-file-alt"></i>
                    <span class='propel-menu-bar-text'>Document Type</span>
                </li>
            </a>
            <a href="{{ url('bloodGroup') }}">
                <li class="bloodGroup">
                    <i class="fas fa-tint"></i>
                    <span class='propel-menu-bar-text'>Blood Group</span>
                </li>
            </a>
            <a href="{{ url('maritalStatus') }}">
                <li class="maritalStatus">
                    <i class="fas fa-ring"></i>
                    <span class='propel-menu-bar-text'>Marital Status</span>
                </li>
            </a>
            <a href="{{ url('relationShip') }}">
                <li class="relationShip">
                    <i class="fas fa-users"></i>
                    <span class='propel-menu-bar-text'>RelationShip</span>
                </li>
            </a>
        </ul>
        <ul class="propel-menu-bar-list-container common-master-menu-bar  ">
            {{-- <p class="propel-menu-bar-title">Organisation</p> --}}
           

           
            <a href="{{ url('country') }}">
                <li class="country">
                    <i class="fas fa-globe"></i>
                    <span class='propel-menu-bar-text'>Country</span>
                </li>
            </a>
            
            <a href="{{ url('state') }}">
                <li class="state">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class='propel-menu-bar-text'>State</span>
                </li>
            </a>
            <a href="{{ url('city') }}">
                <li class="city">
                    <i class="fas fa-city"></i>
                    <span class='propel-menu-bar-text'>City</span>
                </li>
            </a>

            <a href="{{ url('bankAccountType') }}">
                <li class="bankAccountTypes">
                    <i class="fas fa-credit-card"></i>
                    <span class='propel-menu-bar-text'>Bank Account Types</span>
                </li>
            </a>
            <a href="{{ url('bank') }}">
                <li class="banks">
                    <i class="fas fa-university"></i>
                    <span class='propel-menu-bar-text'>Banks</span>
                </li>
            </a>
            <a href="{{ url('addressType') }}">
                <li class="addressType">
                    <i class="fas fa-address-card"></i>
                    <span class='propel-menu-bar-text'>Address Type</span>
                </li>
            </a>
            <a href="{{ url('language') }}">
                <li class="language">
                    <i class="fas fa-language"></i>
                    <span class='propel-menu-bar-text'>Languages</span>
                </li>
            </a>
        </ul>
        <ul class="propel-menu-bar-list-container organisation-menu-bar ">
            <a href="{{ url('businessActivity') }}">
                <li class="businessActivities">
                    <i class="fas fa-briefcase"></i>
                    <span class='propel-menu-bar-text'>Business Activities</span>
                </li>
            </a>
            <a href="{{ url('administratorType') }}">
                <li class="administratorTypes">
                    <i class="fas fa-user-tie"></i>
                    <span class='propel-menu-bar-text'>Administrator Types</span>
                </li>
            </a>

            <a href="{{ url('businessSaleSubset') }}">
                <li class="businessSaleSubsets">
                    <i class="fas fa-shopping-cart"></i>
                    <span class='propel-menu-bar-text'>Business Sale Subsets</span>
                </li>
            </a>
            <a href="{{ url('businessSector') }}">
                <li class="businessSector">
                    <i class="fas fa-building"></i>
                    <span class='propel-menu-bar-text'>Business Sector</span>
                </li>
            </a>
            <a href="{{ url('organizationCategory') }}">
                <li class="organizationCategory">
                    <i class="fas fa-sitemap"></i>
                    <span class='propel-menu-bar-text'>Organization Category</span>
                </li>
            </a>
            <a href="{{ url('organizationDocumentType') }}">
                <li class="organizationDocumentType">
                    <i class="far fa-file-alt"></i>
                    <span class='propel-menu-bar-text'>Organization Document Type</span>
                </li>
            </a>
            <a href="{{ url('organizationOwnerShip') }}">
                <li class="organizationOwnerships">
                    <i class="fas fa-users"></i>
                    <span class='propel-menu-bar-text'>Organization Ownerships</span>
                </li>
            </a>

        </ul>
        <ul class="propel-menu-bar-list-container inbox-menu-bar ">
            {{-- <p class="propel-menu-bar-title">Inbox</p> --}}
            <li>Inbox</li>
            <li>Analytics</li>
            <li>CRM</li>
            <li>Harish</li>
            <li>Raguram</li>
            <li>Vallatharsu</li>
            <li>Lokeshwari</li>
            <li>Consulting</li>
        </ul>
        <ul class="propel-menu-bar-list-container cardimage-menu-bar ">
            {{-- <p class="propel-menu-bar-title">Card Image</p> --}}
            <a href="{{ url('roles') }}">
                <li class="role">
                    <i class="far fa-file-alt"></i>
                    <span class='propel-menu-bar-text'>&nbsp; Roles</span>
                </li>
            </a>
            <a href="{{ url('users') }}">
                <li class="user">
                    <i class="far fa-file-alt"></i>
                    <span class='propel-menu-bar-text'>&nbsp; Users</span>
                </li>
            </a>
        </ul>
        <ul class="propel-menu-bar-list-container emojikiss-menu-bar ">
            {{-- <p class="propel-menu-bar-title">Emoji Kiss</p> --}}
            <li>Emoji Kiss</li>
            <li>Analytics</li>
            <li>CRM</li>
            <li>Harish</li>
            <li>Raguram</li>
            <li>Vallatharsu</li>
            <li>Lokeshwari</li>
            <li>Consulting</li>
        </ul>
    </div>


    <div class="propel-workspace-container">
        <div class="propel-breadcrumbs">

            <nav class="float-left propel-breadcrumbs-list"></nav>
            <nav>
                <button
                    class="propelbtn propelbtn-sm propeliconbtn  propelbtncurved  float-right workspace-fullscreen  ">

                    <svg width="10" height="10" fill="currentColor" class="bi bi-arrows-move"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>
                </button>
            </nav>
            <nav class="float-right propel-breadcrumb-extra-content">
            </nav>


        </div>

        <div class="mb-2"></div>

        @yield('content')
    </div>
