<table class="head">
    <tr>
        <td><img src="{{ asset('images/logo.png') }}" width="150" height="120"></td>
        <td>
            <center>
                <font size="5"><b>{{ settings()->get('app_name', 'My App') }}</b></font><br>
                <font size="2">{!! settings()->get('app_address') !!}</font>
                <font size="2"><i>Email : {{ settings()->get('app_email') }}</i></font>
                <font size="2"><i>Telp :{{ settings()->get('app_phone') }}</i></font>
            </center>
        </td>
        <td><img src="{{ asset('images/logodinaspendidikan.png') }}" width="100" height="110"></td>
    </tr>
    <tr>
        <td colspan="3">
            <hr>
        </td>
    </tr>
</table>
