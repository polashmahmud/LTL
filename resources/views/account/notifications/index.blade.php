@extends('account.layouts.default')

@section('account-content')
    <div class="card-body">
        <h2 class="mb-4">All notifications</h2>
        <div class="row">
            <div class="col-12">
                <ul class="timeline">
                    <li class="timeline-event">
                        <div class="timeline-event-icon bg-twitter-lt"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                        </div>
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">10 hrs ago</div>
                                <h4>+1150 Followers</h4>
                                <p class="text-muted">You’re getting more and more followers, keep it up!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><path d="M12 12l0 .01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                        </div>
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">2 hrs ago</div>
                                <h4>+3 New Products were added!</h4>
                                <p class="text-muted">Congratulations!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        </div>
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">1 day ago</div>
                                <h4>Database backup completed!</h4>
                                <p class="text-muted">Download the <a href="#">latest backup</a>.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="timeline-event-icon bg-facebook-lt"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg>
                        </div>
                        <div class="card timeline-event-card">
                            <div class="card-body">
                                <div class="text-muted float-end">1 day ago</div>
                                <h4>+290 Page Likes</h4>
                                <p class="text-muted">This is great, keep it up!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/user-plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 11h6m-3 -3v6" /></svg>
                        </div>
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
                        <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/photo -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8l.01 0" /><path d="M4 4m0 3a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3z" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
                        </div>
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
                        <div class="timeline-event-icon"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                        </div>
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
