@include('partnerdashboard.include.header')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3">
                    <h6>Welcome to dashbaord <span class="fs-4 text-primary"> {{auth()->user()->name}} </span></h6>
                </div>
                <div class="col-3 mb-2">
                    <div class="card mb-3 w-100 h-100 p-3" style="background-color: #6571FF;">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-ticket text-white"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="text-white fs-larger" style="font-size: large">Pending Request</div>
                                <div class="text-white" style="font-size: larger">{{@$pending}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card mb-3 w-100 h-100 p-3" style="background-color: #0AC074">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-cta-right text-white"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="text-white fs-larger" style="font-size: large">Approved Request</div>
                                <div class="text-white" style="font-size: larger">{{@$Approved}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card mb-3 w-100 h-100 p-3" style="background-color: #6F42C1">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-white"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="text-white fs-larger" style="font-size: large">Total Request</div>
                                <div class="text-white" style="font-size: larger">{{@$total}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card mb-3 w-100 h-100 p-3" style="background-color: #c14242">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-white"></i>
                            </div>
                            <div class="stat-content dib">
                                <div class="text-white fs-larger" style="font-size: large">Rejected Request</div>
                                <div class="text-white" style="font-size: larger">{{@$Rejected}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2 ">
                    <div class="card bg-light">
                        <div class="row g-0">
                            <div class="col-md-6">
                            <img src="{{asset('images/search.png')}}" style="height: 250px; object-fit:contain; width:100%; padding:10px;" class="img-fluid rounded-start" alt="Images">
                            </div>
                            <div class="col-md-6">
                            <div class="card-body">
                                <h6 class="card-title fw-bold mb-0">Categories</h6>
                                <hr>
                                <p class="card-text" style="background: #47adb1; padding: 12px;color: white;
                                border-radius: 5px;font-weight: bold;"><i class="las la-clipboard-check"></i> Home : {{@$home}}</p>
                                <p class="card-text" style="background: #5656d2; padding: 12px;color: white;
                                border-radius: 5px;font-weight: bold;"><i class="las la-redo-alt"></i> Office : {{@$office}}</p>
                                <p class="card-text" style="background: #aa46ba; padding: 12px;color: white;
                                border-radius: 5px;font-weight: bold;"><i class="las la-redo-alt"></i> Retail : {{@$retail}}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 


@include('partnerdashboard.include.footer-bar')

@include('partnerdashboard.include.footer')
