<div class="alert alert-primary">
    <input type="hidden" value="{{$message->id}}" class="messageId">
    <p style="word-wrap: break-word;">
        message:
                 @if($message->message_type == 'file')
                     {{$message->file_text}}
                 @elseif(strlen($message->message) < 1000)
                     {{$message->message}}
                 @else
                     Текст слишком большой
                 @endif
    </p>
    <hr>
    <p style="word-wrap: break-word;">
        encrypt message: @if(!empty($message->encode))
                            {{$message->encode}}
                         @elseif($message->file_encode !== null)
                             {{$message->file_encode}}
                         @else
                            Текс слишком большое для вывода.
                         @endif
    </p>
    <hr>
    <p>crypt type: {{$message->type}}</p>
    <hr>
    <p>crypt time: {{$message->time}}</p>
    <hr>
    <div class="float-left">Created in {{$message->created_at}}</div>
    <div class="float-right">
        <button type="button" class="btn btn-danger delete-message" data-id="{{ $message->id }}">
            delete <i class="fas fa-trash-alt"></i>
        </button>
        <button class="btn btn-success decrypt">
            decrypt <i class="fas fa-unlock-alt"></i>
        </button>
    </div>
    <br>
    <br>
</div>