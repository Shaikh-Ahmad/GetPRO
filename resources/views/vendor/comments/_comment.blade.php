@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media">
@endif
   
    <a  href="/profiledetail/{{ $comment->commenter->id}}">
        <img class="img-fluid rounded-circle mr-3" src="/storage/profile_pics/{{$comment->commenter->profiledetail->profile_pic}}" width="90%" height="90%" >
    </a>
    <!--<img class="mr-3" src="https://www.gravatar.com/avatar/{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg?s=64" alt="{ $comment->commenter->name ?? $comment->guest_name }} Avatar"> -->
    <div class="media-body">
        <a  href="/profiledetail/{{ $comment->commenter->id}}">
            <h5 class="mt-0 mb-1">{{ $comment->commenter->name ?? $comment->guest_name }} 
        </a>
            <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        
        <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

        <div>
            @can('reply-to-comment', $comment)
                <p data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm text-primary text-uppercase">Reply</p>
            @endcan
            @can('edit-comment', $comment)
                <p data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm text-primary text-uppercase">Edit</p>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase"><p class="text-danger">Delete</p></a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Edit your comment here:</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Reply to Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Enter your message here:</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                    <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        {{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif
        
    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif