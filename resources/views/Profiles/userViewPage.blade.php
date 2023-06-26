@extends('layouts.dashboard.app')
@section('content')
    <!-- | -->
    <div class="user0  profile for-active">

    </div> <!-- | -->
    <div class="container">

        <div class="row  justify-content-center userView pl-1 pr-1">
            <div class=" userView-item p-2 " vh="150">
                <div class="card shadow-none">
                    <div class="card-body p-0 d-flex flex-column gap-10">
                        <div class="card d-flex flex-row  propel-card   p-1 " style="height:130px;">
                            @if (isset($userProfile['profile_pic']))
                                <a class="d-flex" href="#">
                                    <img alt="Profile" src="{{ asset('profiles/' . $userProfile['profile_pic']) }}"
                                        class="img-thumbnail border-0 rounded-circle m-4 list-thumbnail align-self-center">
                                </a>
                            @else
                                <a class="d-flex" href="#">
                                    <div
                                        class="rounded-circle ml-3 mr-3 align-self-center list-thumbnail-letters text-uppercase font-weight-bold">
                                        @if ($userDatas['nick_name'])
                                            {{ $userDatas['nick_name'][0] }}
                                        @else
                                            {{ $userDatas['first_name'][0] }}
                                        @endif
                                    </div>
                                </a>
                            @endif
                            <div class=" d-flex  min-width-zero">
                                <div
                                    class="card-body pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <a href="#">
                                            <p class="list-item-heading mb-1 truncate text-capitalize .f-600">
                                                {{ $userDatas['first_name'] }} {{ $userDatas['middle_name'] }}
                                                {{ $userDatas['last_name'] }}</p>
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card propel-card flex-grow" vh="306">
                            <div class="card-body text-left pt-0 ">
                                <div class="card-header mt-2">
                                    <h3 class="w-100 text-center .f-600">Personal Information</h3>
                                </div>
                                @foreach ($primaryMobiles as $number)
                                    @if ($number['mobile_cachet'] == 1)
                                        <p><i class="fas fa-mobile-alt" style="color: blue;"></i>
                                            <i class="fas fa-key fa-xs"
                                                style="margin-left:-5px;rotate:118deg;color: blue;"></i>
                                            </i>&emsp;{{ $number['mobile_no'] }} </h6>
                                    @endif
                                @endforeach

                                @foreach ($primaryEmail as $email)
                                    @if ($email['email_cachet'] == 1)
                                        <p><i class="far fa-envelope" style="color: green;"></i><i class="fas fa-key fa-xs"
                                                style="rotate:118deg;color: green;"></i>&emsp;{{ $email['email'] }} </h6>
                                    @endif
                                @endforeach
                                <p> <i class="fas fa-birthday-cake" style="color: purple;"></i>&emsp;{{ $userDatas['dob'] }}
                                    </h6>
                                <p><i class="fas fa-tint" style="color: red;"></i>
                                    &emsp;{{ $userBloodGroup['blood_group'] }} </h6>
                                <p><i class="fas fa-venus-mars"
                                        style="color: rgb(245, 89, 224);"></i>&emsp;{{ $userGender['gender'] }}</h6>
                                <p><i class="fas fa-map-marker-alt" style="color: brown;"></i>&emsp; Address
                                    </h6>
                                    @foreach ($primaryMobiles as $number)
                                        @if ($number['mobile_cachet'] != 1)
                                            <p><i class="fas fa-mobile-alt" style="color: rgba(0, 0, 255, 0.479);"></i>

                                                </i>&emsp;{{ $number['mobile_no'] }} </h6>
                                        @endif
                                    @endforeach

                                    @foreach ($primaryEmail as $email)
                                        @if ($email['email_cachet'] != 1)
                                            <p><i class="far fa-envelope"
                                                    style="color: rgba(0, 128, 0, 0.553);"></i>&emsp;{{ $email['email'] }}
                                                </h6>
                                        @endif
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="userView-item p-2" vh="150">
                <div class="card  propel-card   h-100">
                    <div class="card-header mt-2">
                        <h3 class="w-100 text-center .f-600"> Profession and Education</h3>

                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-briefcase"></i> Founder of Web Technology</p>
                    </div>
                </div>
            </div>

            <div class="userView-item d-flex flex-wrap p-2 gap-10" vh="150">
                <div class="card  propel-card" style="height:48.5%;overflow:auto;">
                    <div class="card-header mt-2">
                        <h3 class="w-100 text-center .f-600"> Banks</h3>

                    </div>

                    <div class="card-body  pt-0  d-flex flex-column ">
                        <p><i class="fas fa-credit-card" style="color: blue;"></i>
                            &emsp;345345345345 </p>

                        <p><i class="fas fa-piggy-bank" style="color: green;"></i>&emsp;SB </p>

                        <p> <i class="fas fa-university" style="color: purple;"></i>&emsp;IFc23423423</p>
                        <p><i class="fas fa-building" style="color: red;"></i> &emsp;ICICI</p>
                        <p><i class="fas fa-code-branch" style="color: rgb(245, 89, 224);"></i>&emsp;Trichy Main</p>
                        <p><i class="fas fa-map-marker-alt" style="color: brown;"></i>&emsp; Trichy</p>
                    </div>
                </div>
                <div class="card   propel-card   " style="height:48.5%;overflow:auto;">
                    <div class="card-header mt-2">
                        <h3 class="w-100 text-center .f-600"> Family </h3>

                    </div>

                    <div class="card-body pt-0  d-flex flex-column ">
                        <p><i class="fas fa-male" style="color: blue;"></i>&emsp; </h6>

                        <p><i class="fas fa-female" style="color: green;"></i>&emsp; </h6>

                        <p> <i class="fas fa-child" style="color: purple;"></i>&emsp;</h6>
                        <p><i class="fas fa-users" style="color: red;"></i> &emsp;</h6>

                            </h6>
                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>
    {{-- <a href="{{ route('personProfiles')}}" class="btn btn-primary">Edit</a> --}}
    <script>
        document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
            `<a href="{{ route('personProfiles') }}"><button class='propelbtn propelbtn-sm propelbtncurved propeladd propel-hover'>Edit</button></a>`;
    </script>
    <style>
        .userView {
            gap: 10px;

        }

        .userView-item {
            flex: 1 0 300px;
        }

        .gap-10 {
            gap: 10px;
        }

        .userView-item:last-child>.card {
            flex: 1 0 300px;
        }

        .userView p {
            /* font-size: 1.1rem; */
            cursor: pointer;
        }

        /* .userView p:hover i {
            rotate: 25deg;
        } */

        .userView p:hover {
            font-weight: bold;
        }
    </style>
@endsection
