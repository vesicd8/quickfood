<section id="section-8">

    <div class="row">
        <div class="col-md-6 col-sm-6 add_bottom_15">
            <div class="indent_title_in">
                <i class="icon_lock_alt"></i>
                <h3>Change your password</h3>
            </div>
            <div class="wrapper_indent">
                <div class="form-group">
                    <label>Old password</label>
                    <input class="form-control" name="old_password" id="old_password" type="password">
                </div>
                <div class="form-group">
                    <label>New password</label>
                    <input class="form-control" name="new_password" id="new_password" type="password">
                </div>
                <div class="form-group">
                    <label>Confirm new password</label>
                    <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                </div>
                <button type="submit" class="btn_1 green">Update Password</button>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 add_bottom_15">
            <div class="indent_title_in">
                <i class="icon_mail_alt"></i>
                <h3>Change your email</h3>
            </div>
            <div class="wrapper_indent">
                <div class="form-group">
                    <label>Old email</label>
                    <input class="form-control" name="old_email" id="old_email" type="email">
                </div>
                <div class="form-group">
                    <label>New email</label>
                    <input class="form-control" name="new_email" id="new_email" type="email">
                </div>
                <div class="form-group">
                    <label>Confirm new email</label>
                    <input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email">
                </div>
                <button type="submit" class="btn_1 green">Update Email</button>
            </div>
        </div>
    </div>

    <hr class="styled_2">

    <div class="row">
        <div class="col-md-9 col-sm-6 add_bottom_15 mx-auto">

            <div class="indent_title_in">
                <h3>Login history</h3>
            </div>

            <div class="wrapper_indent">
                <div class="form-group">
                    <label>History</label>
                    <div class="table-responsive">
                        <table class="table edit-options">
                            <tbody>
                            <tr class="text-left">
                                <th style="width:20%">
                                    IP
                                </th>
                                <th style="width:25%" class="text-center">
                                    Username
                                </th>
                                <th style="width:15%" class="text-center">
                                    Password
                                </th>
                                <th style="width:40%" class="text-center">
                                    Time
                                </th>
                            </tr>
                            <tr class="text-left">
                                <td style="width:20%" class="p-2">
                                    192.168.1.1
                                </td>
                                <td style="width:25%" class="text-center">
                                    Username
                                </td>
                                <td style="width:15%" class="text-center">
                                    Password
                                </td>
                                <td style="width:40%" class="text-center">
                                    13:51 25.12.2020.
                                </td>
                            </tr>
                            <tr class="text-left">
                                <td style="width:20%" class="p-2">
                                    192.168.1.1
                                </td>
                                <td style="width:25%" class="text-center">
                                    Username
                                </td>
                                <td style="width:15%" class="text-center">
                                    Password
                                </td>
                                <td style="width:40%" class="text-center">
                                    13:51 25.12.2020.
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="text-danger mt-5" id="clear-login-history">Clear login history</a>
                </div>
            </div>
        </div>
    </div>
</section>
