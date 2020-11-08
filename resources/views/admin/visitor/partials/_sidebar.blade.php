<!-- Sidebar -->
<div class="sidebar @yield('sidebar-class')">
    <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
        <div class="container-xxl ">

            <div class="row align-items-center">
                <!-- Chat photo -->
                <div class="col-9 col-xl-9 ">
                    <div class="media text-xl-left">

                        <div class="media-body align-self-center text-truncate">
                            <h6 class="text-truncate mb-n1">{{ trans_choice('visitors.title', 1) }}</h6>
                            <small class="text-muted">{{__('Visitor list')}}</small>
                        </div>
                    </div>
                </div>

                <!-- Chat toolbar -->
                <div class="col-3 col-xl-3 text-right">
                    <ul class="nav justify-content-end">
                        <!-- Mobile nav -->
                        <li class="nav-item list-inline-item d-block d-xl-none">
                            <a class="nav-link text-muted px-0" href="#" data-chat="open">
                                <i class="icon-md fe-chevron-right"></i>
                            </a>
                        </li>
                        <!-- Mobile nav -->
                    </ul>
                </div>

            </div><!-- .row -->

        </div>
    </div>
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container-fluid py-6">
                <nav class="mb-n6">
                 @if(count($visitors))
                @foreach($visitors as $visit)
                    <!-- visitor -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-5">
                                        @if($visit->invitationFirst->visitor->getFirstMediaUrl('visitor'))
                                            <img class="avatar-img" src="{{ asset($visit->invitationFirst->visitor->getFirstMediaUrl('visitor')) }}" alt="">
                                        @else
                                            <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                        @endif
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="mb-0">{{ $visit->invitationFirst->visitor->name }}</h6>
                                        <small class="text-muted">{{$visit->invitationFirst->visitor->email}}</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown z-index-max">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="{{route('admin.visitors.destroy',$visit->invitationFirst->visitor->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form{{$visit->invitationFirst->visitor->id}}').submit()">
                                                    Delete <span class="ml-auto fe-trash-2"></span>
                                                </a>
                                                <form id="delete-form{{$visit->invitationFirst->visitor->id}}" action="{{ route('admin.visitors.destroy',$visit->invitationFirst->visitor->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('delete') }}
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Link -->
                                <a href="{{route('admin.visitors.show',$visit->invitationFirst->visitor->id)}}" class="stretched-link"></a>
                            </div>
                        </div>
                        </a>
                    @endforeach
                @endif
                    @if(!blank($visitors->links()))
                        {{ $visitors->links() }}
                    @endif
                </nav>
                <!-- visitors -->
            </div>
        </div>

    </div>
</div>
<!-- Sidebar -->
