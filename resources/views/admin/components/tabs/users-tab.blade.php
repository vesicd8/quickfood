<section id="section-6">
    <div class="indent_title_in">
        <h3>Users</h3>
    </div>

    <div class="wrapper_indent">
        <div class="strip_menu_items">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Options</label>
                                <ul class="list-options d-flex justify-content-between">
                                    <li>
                                        <a class="text-danger" id="delete-from-inbox" href="#" title="Delete selected messages"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="text-primary" id="mark-read-inbox" href="#" title="Mark as read"><i class="fas fa-check" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a class="text-success" id="refresh-inbox" href="#" title="Refresh your inbox"><i class="fas fa-sync-alt" aria-hidden="true"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Search for user</label>
                                <input type="text" name="menu_item_title" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="button" class="btn_1" value="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="table-responsive">
                <table class="table edit-options">
                    <tbody>
                    <tr class="text-left inbox-message unread">
                        <td style="width:10%" class="p-2">

                        </td>
                        <td style="width:25%">
                            Name
                        </td>
                        <td style="width:50%">
                            Email
                        </td>
                        <td style="width:50%">
                            Registred:
                        </td>
                    </tr>
                    @foreach($users as $user)
                        <tr class="text-left inbox-message {{ !$user->checked ? "unread" : "" }}">
                            <td style="width:10%" class="p-2">
                                <input type="checkbox" data-id="{{ $user->id }}">
                            </td>
                            <td style="width:25%">
                                "{{ $user->first_name }} {{ $user->last_name }}"
                            </td>
                            <td style="width:50%">
                                {{ $user->email }}
                            </td>
                            <td style="width:50%">
                                {{ $user->registred }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="mx-0">
                <ul class="pagination mx-0">
                    <li class="page-item mx-0 px-0"><a class="page-link" href="#">Previous</a></li>
                    @foreach(range(1, $users->onEachSide) as $link)
                        <li class="page-item mx-0"><a class="page-link" href="#">{{ $loop->index + 1}} </a></li>
                    @endforeach
                    <li class="page-item mx-0"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</section>
