@extends('layouts.mail')

@section('header.content')

    <tr>
        <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
    </tr>
    <tr>
        <td class="center-text" align="center"
            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#d7e057;text-decoration:none;letter-spacing:0px;">

            <div>
               New Message
            </div>

        </td>
    </tr>
    <tr>
        <td height="10" style="font-size:10px;line-height:10px;">&nbsp;</td>
    </tr>
@endsection

@section('arrow.content')
    <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
        style="width:100%;max-width:100%;">
        <!-- lotus-arrow-divider -->
        <tr>
            <td align="center" bgcolor="#FFFFFF">
                <img style="width:100px;border:0px;display: inline!important; position: relative; top: -20px;"
                    src="{{ asset('assets/img/emails/Arrow.png') }}" width="50" border="0" alt="arrow">
            </td>
        </tr>
    </table>
@endsection


@section('content')
    <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
        style="width:100%;max-width:100%;">
        <!-- lotus-content-1-1 -->
        <tr>
            <td align="center" bgcolor="#FFFFFF" class="container-padding">

               {{ $data['payload'] }}

            </td>
        </tr>
    </table>
@endsection