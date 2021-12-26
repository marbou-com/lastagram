<div class="c-post-gallery">
    <div class="gallery">

      @foreach($posts as $post)
        <div class="gallery-item" tabindex="0">
          
          @php
           //dd(auth()->id())   
          @endphp

          
          <img src="{{ asset('storage/images/'.$post->img_url) }}" class="gallery-image" alt="">



          @if(auth()->id()==$post->user_id)
            <a class="" href="{{ route('posts.edit' ,['post'=>$post->id]) }}" style="color:white">
          @endif
              <div class="gallery-item-info">

                <ul>
                  <li class="gallery-item-likes">
                    <span class="visually-hidden">Likes:</span>
                    <i class="fas fa-heart" aria-hidden="true"></i> {{ count($post->likes) }}
                  </li>
                  <li class="gallery-item-comments">
                    <span class="visually-hidden">Comments:</span>
                    <i class="fas fa-comment" aria-hidden="true"></i> {{ count($post->comments) }}
                  </li>
                </ul>

              </div>
          @if(auth()->id()==$post->user_id)
            </a>
          @endif


        </div>
        @endforeach


    </div>
  </div>