<div class="page-content-wrapper-inner">
    <div class="content-viewport">
      <div class="row">
        <div class="py-5 col-12">
          <h4>Dashboard</h4>
          <p class="text-gray">Welcome aboard, Allen Clerk</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
            <div class="grid-body text-gray">
              <div class="d-flex justify-content-between">
                <p>30%</p>
                <p>+06.2%</p>
              </div>
              <p class="text-black">Traffic</p>
              <div class="mt-4 wrapper w-50">
                <canvas height="45" id="stat-line_1"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
            <div class="grid-body text-gray">
              <div class="d-flex justify-content-between">
                <p>43%</p>
                <p>+15.7%</p>
              </div>
              <p class="text-black">Conversion</p>
              <div class="mt-4 wrapper w-50">
                <canvas height="45" id="stat-line_2"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
            <div class="grid-body text-gray">
              <div class="d-flex justify-content-between">
                <p>23%</p>
                <p>+02.7%</p>
              </div>
              <p class="text-black">Bounce Rate</p>
              <div class="mt-4 wrapper w-50">
                <canvas height="45" id="stat-line_3"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6 equel-grid">
          <div class="grid">
            <div class="grid-body text-gray">
              <div class="d-flex justify-content-between">
                <p>75%</p>
                <p>- 53.34%</p>
              </div>
              <p class="text-black">Marketing</p>
              <div class="mt-4 wrapper w-50">
                <canvas height="45" id="stat-line_4"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 equel-grid">
          <div class="grid">
            <div class="grid-body d-flex flex-column h-100">
              <div class="wrapper">
                <div class="d-flex justify-content-between">
                  <div class="split-header">
                      <i></i>
                    <img class="mt-1 mb-1 mr-2 img-ss" src="{{ asset('admin_assets/images/social-icons/instagram.svg') }} " alt="instagram">
                    <p class="card-title">Followers Growth</p>
                  </div>
                  <div class="wrapper">
                    <button class="pr-0 btn action-btn btn-xs component-flat" type="button"><i class="mdi mdi-access-point text-muted mdi-2x"></i></button>
                    <button class="pr-0 btn action-btn btn-xs component-flat" type="button"><i class="mdi mdi-cloud-download-outline text-muted mdi-2x"></i></button>
                  </div>
                </div>
                <div class="pt-2 mb-4 d-flex align-items-end">
                  <h4>16.2K</h4>
                  <p class="ml-2 text-muted">New Followers</p>
                </div>
              </div>
              <div class="mt-auto">
                <canvas class="curved-mode" id="followers-bar-chart" height="220"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 equel-grid">
          <div class="grid">
            <div class="grid-body">
              <p class="card-title">Campaign</p>
              <div id="radial-chart"></div>
              <h4 class="text-center">$23,350.00</h4>
              <p class="text-center text-muted">Used balance this billing cycle</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 equel-grid">
          <div class="grid table-responsive">
            <table class="table table-stretched">
              <thead>
                <tr>
                  <th>Symbol</th>
                  <th>Price</th>
                  <th>Change</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p class="mb-n1 font-weight-medium">AAPL</p>
                    <small class="text-gray">Apple Inc.</small>
                  </td>
                  <td class="font-weight-medium">198.18</td>
                  <td class="text-danger font-weight-medium">
                    <div class="badge badge-success">-1.39%</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-n1 font-weight-medium">NKE</p>
                    <small class="text-gray">Nike,Inc.</small>
                  </td>
                  <td class="font-weight-medium">03.95</td>
                  <td class="text-danger font-weight-medium">
                    <div class="badge badge-danger">-1.17%</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-n1 font-weight-medium">NSEI</p>
                    <small class="text-gray">Nifty 50</small>
                  </td>
                  <td class="font-weight-medium">11,278</td>
                  <td class="text-danger font-weight-medium">
                    <div class="badge badge-success">-0.24%</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-n1 font-weight-medium">BA</p>
                    <small class="text-gray">The Boeing Company</small>
                  </td>
                  <td class="font-weight-medium">354.67</td>
                  <td class="text-success font-weight-medium">
                    <div class="badge badge-success">+0.15%</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="mb-n1 font-weight-medium">SBUX</p>
                    <small class="text-gray">Starbucks Corporation</small>
                  </td>
                  <td class="font-weight-medium">08.42</td>
                  <td class="text-success font-weight-medium">
                    <div class="badge badge-success">+0.67%</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 equel-grid">
          <div class="grid">
            <div class="grid-body">
              <div class="split-header">
                <p class="card-title">Available Balance</p>
                <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="Available balance since the last week">
                  <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
                </span>
              </div>
              <div class="mt-2 d-flex align-items-end">
                <h3>26.00453100</h3>
                <p class="ml-1 font-weight-bold">BTC</p>
              </div>
              <div class="mt-2 d-flex">
                <div class="pr-4 wrapper d-flex">
                  <small class="mr-2 text-success font-weight-medium">USD</small>
                  <small class="text-gray">$103,342.50</small>
                </div>
                <div class="wrapper d-flex">
                  <small class="mr-2 text-primary font-weight-medium">EUR</small>
                  <small class="text-gray">$91,105.00</small>
                </div>
              </div>
              <div class="flex-row mt-4 mb-4 d-flex">
                <button class="mr-2 btn btn-outline-light text-gray component-flat w-50" type="button">SEND</button>
                <button class="ml-2 btn btn-primary w-50" type="button">RECEIVE</button>
              </div>
              <div class="mt-5 mb-3 d-flex">
                <small class="mb-0 text-primary">Recent Transaction (3)</small>
              </div>
              <div class="py-2 d-flex justify-content-between border-bottom">
                <p class="text-black">Received Bitcoin</p>
                <p class="text-gray">+0.00005462 BTC</p>
              </div>
              <div class="py-2 d-flex justify-content-between border-bottom">
                <p class="text-black">Sent Bitcoin</p>
                <p class="text-gray">-0.00001446 BTC</p>
              </div>
              <div class="pt-2 d-flex justify-content-between">
                <p class="text-black">Sent Bitcoin</p>
                <p class="text-gray">-0.00003573 BTC</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-12 equel-grid">
          <div class="grid widget-revenue-card">
            <div class="grid-body d-flex flex-column h-100">
              <div class="split-header">
                <p class="card-title">Server Load</p>
                <div class="content-wrapper v-centered">
                  <small class="text-muted">2h ago</small>
                  <span class="btn action-btn btn-refresh btn-xs component-flat">
                    <i class="mdi mdi-autorenew text-muted mdi-2x"></i>
                  </span>
                </div>
              </div>
              <div class="mt-auto">
                <canvas id="cpu-performance" height="80"></canvas>
                <h3 class="mt-4 font-weight-medium">69.05%</h3>
                <p class="text-gray">Storage is getting full</p>
                <div class="w-50">
                  <div class="mt-3 d-flex justify-content-between text-muted">
                    <small>Usage</small> <small>35.62 GB / 2TB</small>
                  </div>
                  <div class="mt-2 progress progress-slim">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 equel-grid">
          <div class="grid">
            <div class="py-3 grid-body">
              <p class="card-title ml-n1">Order History</p>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-sm">
                <thead>
                  <tr class="solid-header">
                    <th colspan="2" class="pl-4">Customer</th>
                    <th>Order No</th>
                    <th>Purchased On</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="pl-4 pr-0">
                      <img class="profile-img img-sm" src="{{ asset('admin_assets/images/profile/male/image_4.png') }}" alt="profile image">
                    </td>
                    <td class="pl-md-0">
                      <small class="text-black font-weight-medium d-block">Barbara Curtis</small>
                      <span class="text-gray">
                        <span class="status-indicator rounded-indicator small bg-primary"></span>Account Deactivated </span>
                    </td>
                    <td>
                      <small>8523537435</small>
                    </td>
                    <td> Just Now </td>
                  </tr>
                  <tr>
                    <td class="pl-4 pr-0">
                      <img class="profile-img img-sm" src="{{ asset('admin_assets/images/profile/male/image_3.png') }}" alt="profile image">
                    </td>
                    <td class="pl-md-0">
                      <small class="text-black font-weight-medium d-block">Charlie Hawkins</small>
                      <span class="text-gray">
                        <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                    </td>
                    <td>
                      <small>9537537436</small>
                    </td>
                    <td> Mar 04, 2018 11:37am </td>
                  </tr>
                  <tr>
                    <td class="pl-4 pr-0">
                      <img class="profile-img img-sm" src="{{ asset('admin_assets/images/profile/female/image_2.png') }}" alt="profile image">
                    </td>
                    <td class="pl-md-0">
                      <small class="text-black font-weight-medium d-block">Nina Bates</small>
                      <span class="text-gray">
                        <span class="status-indicator rounded-indicator small bg-warning"></span>Payment On Hold </span>
                    </td>
                    <td>
                      <small>7533567437</small>
                    </td>
                    <td> Mar 13, 2018 9:41am </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <a class="px-3 py-2 border-top d-block text-gray" href="#">
              <small class="font-weight-medium"><i class="mr-2 mdi mdi-chevron-down"></i>View All Order History</small>
            </a>
          </div>
        </div>
        <div class="col-md-4 equel-grid">
          <div class="grid">
            <div class="grid-body">
              <div class="split-header">
                <p class="card-title">Activity Log</p>
                <div class="btn-group">
                  <button type="button" class="pr-0 btn btn-trasnparent action-btn btn-xs component-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Expand View</a>
                    <a class="dropdown-item" href="#">Edit</a>
                  </div>
                </div>
              </div>
              <div class="vertical-timeline-wrapper">
                <div class="timeline-vertical dashboard-timeline">
                  <div class="activity-log">
                    <p class="log-name">Agnes Holt</p>
                    <div class="log-details">Analytics dashboard has been created<span class="ml-1 text-primary">#Slack</span></div>
                    <small class="log-time">8 mins Ago</small>
                  </div>
                  <div class="activity-log">
                    <p class="log-name">Ronald Edwards</p>
                    <div class="log-details">Report has been updated <div class="mt-2 grouped-images">
                        <img class="img-sm" src="{{ asset('admin_assets/images/profile/male/image_4.png') }}" alt="Profile Image" data-toggle="tooltip" title="Gerald Pierce">
                        <img class="img-sm" src="{{ asset('admin_assets/images/profile/male/image_5.png') }}" alt="Profile Image" data-toggle="tooltip" title="Edward Wilson">
                        <img class="img-sm" src="{{ asset('admin_assets/images/profile/female/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Billy Williams">
                        <img class="img-sm" src="{{ asset('admin_assets/images/profile/male/image_6.png') }}" alt="Profile Image" data-toggle="tooltip" title="Lelia Hampton">
                        <span class="plus-text img-sm">+3</span>
                      </div>
                    </div>
                    <small class="log-time">3 Hours Ago</small>
                  </div>
                  <div class="activity-log">
                    <p class="log-name">Charlie Newton</p>
                    <div class="log-details"> Approved your request <div class="mt-2 wrapper">
                        <button type="button" class="btn btn-xs btn-primary">Approve</button>
                        <button type="button" class="btn btn-xs btn-inverse-primary">Reject</button>
                      </div>
                    </div>
                    <small class="log-time">2 Hours Ago</small>
                  </div>
                  <div class="activity-log">
                    <p class="log-name">Gussie Page</p>
                    <div class="log-details">Added new task: Slack home page</div>
                    <small class="log-time">4 Hours Ago</small>
                  </div>
                  <div class="activity-log">
                    <p class="log-name">Ina Mendoza</p>
                    <div class="log-details">Added new images</div>
                    <small class="log-time">8 Hours Ago</small>
                  </div>
                </div>
              </div>
            </div>
            <a class="px-3 py-2 border-top d-block text-gray" href="#">
              <small class="font-weight-medium"><i class="mr-2 mdi mdi-chevron-down"></i> View All </small>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>