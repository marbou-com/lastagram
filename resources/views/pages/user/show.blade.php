@extends('layouts.app')

@section('content')
  <div class="p-user-show">

    <div class="c-user-profile">
      <div class="profile">

          <div class="profile-image">

            <img src="{{ asset('storage/images/img/'.$user->logo_url) }}" alt="" style="width:100%">

          </div>

          <div class="profile-user-settings">

            <h1 class="profile-user-name">{{ $user->name }}</h1>


            @if(!$isFollow)
              <!---->
              <form action="{{route('follows.store')}}" method="POST">
                @csrf
                <input type="hidden" name="to_follow_id" value="{{ $user->id }}">
                <input type="hidden" name="is_follow" value="1">
                <button class="m-btn" btn-type="follow" type="submit">フォロー</button>

              </form>
            @else
              <form action="{{route('follows.destroy' , ['follow'=>$user->id])}}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="to_follow_id" value="{{ $user->id }}">
                <input type="hidden" name="is_follow" value="0">
                <button class="m-btn" btn-type="follow" type="submit">フォローはずす</button>

              </form>
            @endif

            <button aria-label="profile settings" class="btn profile-settings-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-cog"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

          </div>

          <div class="profile-stats">

            <ul>
              <li><span class="profile-stat-count">{{ count($user->posts) }}</span> 投稿</li>
              <li><span class="profile-stat-count">{{ $fCnt_t }}</span> フォロワー</li>
              <li><span class="profile-stat-count">{{ $fCnt_f }}</span> フォロー</li>
            </ul>

          </div>

          <div class="profile-bio">

            <span class="profile-real-name">{{ $user->description }}</span> 

          </div>

      </div>
    </div>
    <!-- End of profile section -->

    @include('components.posts.gallery', ['posts' => $user->posts])

      <!-- End of gallery -->
  </div>
@endsection