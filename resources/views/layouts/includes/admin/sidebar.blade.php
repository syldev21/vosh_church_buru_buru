<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Membership Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Members
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}">{{config('membership.age_clusters.All_members.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Children.id')}}">{{config('membership.age_clusters.Children.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Teenies.id')}}">{{config('membership.age_clusters.Teenies.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Youths.id')}}">{{config('membership.age_clusters.Youths.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Middle_Age.id')}}">{{config('membership.age_clusters.Middle_Age.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Adults.id')}}">{{config('membership.age_clusters.Adults.text')}}</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Cell Groups
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">


                        <a class="nav-link" href="/cell-group">Kiambiu</a>
                        <a class="nav-link" href="/cell-group">Umoja-Bethel</a>
                        <a class="nav-link" href="/cell-group">Chokaa-Berea</a>
                        <a class="nav-link" href="/cell-group">Lang'ata</a>
                        <a class="nav-link" href="/cell-group">Jericho</a>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    Authentication
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/forgot">Reset Password</a>
                        <a class="nav-link" href="/logout">Logout</a>
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>

{{--    <script>--}}
{{--        $(function (){--}}
{{--            $('#dt_select').DataTable();--}}

{{--            $('.church-members').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                let member_category = $(this).data('id');--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                $.ajax({--}}
{{--                    url: '{{route('members.index')}}',--}}
{{--                    data: {--}}
{{--                        member_category: member_category--}}
{{--                    },--}}
{{--                    success: function (data) {--}}
{{--                        $('#dashboar').html(data)--}}
{{--                    }--}}
{{--                })--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
