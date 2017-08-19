@php
    $settings = \Laralum\Tickets\Models\Settings::first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@lang('laralum_tickets::general.ticket_id', ['id' => $ticket->id]) - {{ Laralum\Settings\Models\Settings::first()->appname }}</title>
        @if ($settings->text_editor == 'wysiwyg')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.5/tinymce.min.js"></script>
            <script>
                tinymce.init({ selector:'textarea',   plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ] });
            </script>
        @endif
    </head>
    <body>
        <h1>@lang('laralum_tickets::general.ticket_id', ['id' => $ticket->id])</h1>
        @if(Session::has('success'))
            <hr>
            <p style="color:green">
                {{Session::get('success')}}
            </p>
            <hr>
        @endif
        @if(Session::has('info'))
            <hr>
            <p style="color:blue">
                {{Session::get('info')}}
            </p>
            <hr>
        @endif
        @if(Session::has('error'))
            <hr>
            <p style="color:red">
                {{Session::get('error')}}
            </p>
            <hr>
        @endif
        @if(count($errors->all()))
            <hr>
            <p style="color:red">
                @foreach($errors->all() as $error) {{$error}}<br/>@endforeach
            </p>
            <hr>
        @endif

        <h2>{{ $ticket->subject }}</h2>
        @foreach ($ticket->messages as $message)
                <div>
                    <strong>
                        {{ $message->user->name }}
                        {{ $message->isAdmin() }}
                    </strong>
                    <span>{{ $message->created_at->diffForHumans() }}</span>
                    <br><br>
                    {!! $message->message !!}
                    @can('publicUpdate', $message)
                        <a href="{{ route('laralum_public::tickets.messages.edit', ['message' => $message->id]) }}">
                            @lang("laralum_tickets::general.edit")
                        </a>
                    @endcan
                    @can('publicDelete', $message)
                        <form action="{{ route('laralum_public::tickets.messages.destroy', ['message' => $message->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit">
                                @lang("laralum_tickets::general.delete")
                            </button>
                        </form>
                    @endcan
                </div>
                <hr>
        @endforeach

        <form method="POST" action="{{ route('laralum_public::tickets.messages.store', ['ticket' => $ticket->id]) }}">
            {!! csrf_field() !!}

            <div>
                <label class="uk-form-label">@lang('laralum_tickets::general.message')</label>
                <br>
                @if ($settings->text_editor == 'wysiwyg')
                    <textarea name="message" rows="15">{{ old('message') }}</textarea>
                @else
                    @php
                    $text = old('message');
                    if ($settings->text_editor == 'markdown') {
                        $converter = new League\HTMLToMarkdown\HtmlConverter();
                        $text = $converter->convert($text);
                    }
                    @endphp
                    <textarea name="message" rows="15" placeholder="{{ __('laralum_tickets::general.message') }}">{{ $text }}</textarea>
                    @if ($settings->text_editor == 'markdown')
                        <i>@lang('laralum_tickets::general.markdown')</i>
                    @else
                        <i>@lang('laralum_tickets::general.plain_text')</i>
                    @endif
                @endif
            </div>

            <button type="submit">@lang('laralum_tickets::general.reply')</button>
        </form>
    </body>
</html>
