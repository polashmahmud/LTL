@extends('account.layouts.default')

@section('account-content')
    <div class="card-body">
        <h2 class="mb-4">All notifications</h2>
        <div class="row">
            <div class="col-12">
                <ul class="timeline timeline-simple">
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">10 hrs ago</div>
                                <h4>+1150 Followers</h4>
                                <p class="text-muted">You’re getting more and more followers, keep it up!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">2 hrs ago</div>
                                <h4>+3 New Products were added!</h4>
                                <p class="text-muted">Congratulations!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">1 day ago</div>
                                <h4>Database backup completed!</h4>
                                <p class="text-muted">Download the <a href="#">latest backup</a>.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">1 day ago</div>
                                <h4>+290 Page Likes</h4>
                                <p class="text-muted">This is great, keep it up!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">2 days ago</div>
                                <h4>+3 Friend Requests</h4>
                                <div class="avatar-list mt-3">
          <span class="avatar" style="background-image: url(...)">
            <span class="badge bg-success"></span></span>
                                    <span class="avatar">
            <span class="badge bg-success"></span>JL</span>
                                    <span class="avatar" style="background-image: url(...)">
            <span class="badge bg-success"></span></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">3 days ago</div>
                                <h4>+2 New photos</h4>
                                <div class="mt-3">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="media media-2x1 rounded">
                                                <a class="media-content" style="background-image: url(...)"></a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="media media-2x1 rounded">
                                                <a class="media-content" style="background-image: url(...)"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">2 weeks ago</div>
                                <h4>System updated to v2.02</h4>
                                <p class="text-muted">Check the complete changelog at the <a href="#">activity
                                        page</a>.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
            <button type="submit" class="btn btn-primary">
                Change Password
            </button>
        </div>
    </div>
@endsection
