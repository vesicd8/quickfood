<section id="section-7">

    <div class="indent_title_in">
        <h3>Inbox</h3>
    </div>
    <div class="wrapper_indent">
        <div class="form-group">
            <label>Messages tools</label>
            <ul id="messages-options">
                <li>
                    <a class="text-danger" id="delete-from-inbox" href="#" title="Delete selected messages"><i class="fas fa-trash"></i></a>
                </li>
                <li>
                    <a class="text-primary" id="mark-read-inbox" href="#" title="Mark as read"><i class="fas fa-check"></i></a>
                </li>
                <li>
                    <a class="text-success" id="refresh-inbox" href="#" title="Refresh your inbox"><i class="fas fa-sync-alt"></i></a>
                </li>
            </ul>
        </div>

        <div class="form-group">
            <label>Messages</label>
            <div class="table-responsive">
                <table class="table edit-options">
                    <tbody>
                        @foreach($messages as $message)
                            <tr class="text-left inbox-message {{ $message->seen ? "" : "unread" }}">
                                <td style="width:10%" class="p-2">
                                    <input type="checkbox" name="" id="">
                                </td>
                                <td style="width:15%" class="p-2">
                                    {{ $message->first_name }} {{ $message->last_name }}
                                </td>
                                <td style="width:20%">
                                    {{ strlen($message->title) > 25 ? substr($message->title, 0, 22) . "..." : $message->title }}
                                </td>
                                <td style="width:40%">
                                    {{ strlen($message->message) > 55 ? substr($message->message, 0, 52) . "..." : $message->message }}
                                </td>
                                <td style="width:15%">
                                    {{ $message->date }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
