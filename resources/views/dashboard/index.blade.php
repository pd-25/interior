@include('include.header')

<style>
    .profile-nav,
    .profile-info {
        margin-top: 30px;
    }

    .profile-nav .user-heading {
        background: #fbc02d;
        color: #fff;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        padding: 48px 30px 48px 30px;
        text-align: center;
    }

    .profile-nav .user-heading.round a {
        border-radius: 50%;
        -webkit-border-radius: 50%;
        border: 10px solid rgba(255, 255, 255, 0.3);
        display: inline-block;
    }

    .profile-nav .user-heading a img {
        width: 112px;
        height: 112px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
    }

    .profile-nav .user-heading h1 {
        font-weight: 300;
        margin-bottom: 5px;
    }

    .profile-nav .user-heading p {}

    .profile-nav ul {
        margin-top: 1px;
    }

    button.btn.btn-link.s {
        font-size: 20px;
    }

    .card-body.s {
        font-size: 16px;
        background: #f7e96757;
        border-radius: 10px;
        padding: 20px;
    }

    .card.s {
        margin: 0px 0px 15px 18px;
    }

    .card-header.s {
        padding: 5px;
        background: #ffbd59;
    }

    button.btn.btn-link.s {
        font-size: 17px;
        color: white;
        font-weight: 700;
    }

    .container.bootstrap.snippets.bootdey {
        padding: 60px 0px;
    }
</style>

<div class="container bootstrap snippets bootdey">
    <div class="row justify-content-center">
        <div class="profile-nav col-md-6">
            <div class="panel">
                <div class="user-heading round">
                    <a href="#">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                    </a>
                    <h3>{{ @Auth::user()->name }}</h3>
                    <p>{{ @Auth::user()->email }}</p>
                </div>
            </div>
        </div>
        <div class="profile-info col-md-12">
            <div class="panel">
                <div class="row justify-content-center">
                    <div class="card s">
                        <div class="card-header s" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link s" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Profile
                                </button>
                            </h5>
                        </div>
                        <!-- Content for Home goes here -->
                    </div>

                    <!-- About Section -->
                    <div class="card s">
                        <div class="card-header s" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed s" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Booking Slot
                                </button>
                            </h5>
                        </div>
                        <!-- Content for About goes here -->
                    </div>
                    {{-- <div class="card s">
                        <div class="card-header s" id="headingTwo3">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed s" onclick="window.location='{{ url('logout') }}'"
                    data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="false"
                    aria-controls="collapseTwo3">
                    Log out
                    </button>
                    </h5>
                </div>
                <!-- Content for About goes here -->
            </div> --}}
                </div>
            </div>

            <div class="accordion-menu" id="accordionMenu">
                <div class="accordion">
                    <!-- Content for Home and About is displayed here -->
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionMenu">
                        <div class="card-body s">
                            <div class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h2>Profile</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="bio-row">
                                                <p><span>Name </span>: {{ @Auth::user()->name }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Country </span>: {{ @Auth::user()->country }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Birthday</span>:
                                                    {{ date('d M Y', strtotime(@Auth::user()->dob)) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="bio-row">
                                                <p><span>Occupation </span>: {{ @Auth::user()->occupation }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Email </span>: {{ @Auth::user()->email }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Mobile </span>: {{ @Auth::user()->mobile_no }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionMenu">
                        <div class="card-body s">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ServiceId</th>
                                        <th scope="col">Date / Time</th>
                                        <th scope="col">Home Requirements</th>
                                        <th scope="col">Renovation</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Partner Details</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!@empty($booking))
                                        @foreach ($booking as $item)
                                            <tr>
                                                <td>{{ @$item->service_id }}</td>
                                                <td>
                                                    {{ date('d-M-Y', strtotime(@$item->date)) }}
                                                    <br>
                                                    {{ date('H:i:s', strtotime(@$item->time)) }}
                                                </td>
                                                <td>
                                                    <table>
                                                        @if (!empty($item->renovation))
                                                            @foreach (json_decode($item->home_requirements) as $itemII)
                                                                <tr>
                                                                    <td>{{ $itemII }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </table>
                                                </td>
                                                <td>
                                                    <table>
                                                        @if (!empty($item->renovation))
                                                            @foreach (json_decode($item->home_requirements) as $itemII)
                                                                <tr>
                                                                    <td>{{ $itemII }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </table>
                                                </td>
                                                <td>{{ @$item->service }}</td>
                                                <td>
                                                    {{ @$item->budget }} <br>
                                                    {{ @$item->pincode }} <br>
                                                    {{ @$item->block }} <br>
                                                    {{ @$item->city }} <br>
                                                    {{ @$item->district }}
                                                </td>
                                                <td>
                                                    {{ @$item->partner_details->name }} <br>
                                                    {{ @$item->partner_details->email }} <br>
                                                    {{ @$item->partner_details->mobile_no }}
                                                </td>
                                                @if (@$item->status == 0)
                                                    <td style="color: pink;">Inprogress</td>
                                                @elseif(@$item->status == 1)
                                                    <td style="color: green;">Complete</td>
                                                @elseif(@$item->status == 2)
                                                    <td style="color: red;">Rejected</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    {{-- <tr>
                                        <td>04 Feb 2024</td>
                                        <td>8:00 AM</td>
                                        <td>Plumbing Work</td>
                                        <td>Rony</td>
                                        <td>8170915403</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>03 Feb 2024</td>
                                        <td>6:00 AM</td>
                                        <td>Design, Plan & Architecture</td>
                                        <td>Mark</td>
                                        <td>8768624651</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('include.footer')
