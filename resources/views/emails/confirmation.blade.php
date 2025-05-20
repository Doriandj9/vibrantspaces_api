@extends('layouts.mail')

@section('header.content')
    <tr>
        <td align="center" class="center-text">
            <img style="width:190px;border:0px;display: inline!important;"
                src="{{ asset('assets/img/emails/Email-1_Intro.png') }}" width="190" border="0" alt="intro">
        </td>
    </tr>
    <tr>
        <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
    </tr>
    <tr>
        <td class="center-text" align="center"
            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#d7e057;text-decoration:none;letter-spacing:0px;">

            <div>
                {{ __('pleb.mail.Thanks your contact') }}
            </div>

        </td>
    </tr>
    <tr>
        <td height="10" style="font-size:10px;line-height:10px;">&nbsp;</td>
    </tr>
    <tr>
        <td class="center-text" align="center"
            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:20px;line-height:30px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

            <div>
                {{ __('pleb.mail.Message Confirmation') }}.
            </div>

        </td>
    </tr>
@endsection

@section('arrow.content')
    <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
        style="width:100%;max-width:100%;">
        <!-- lotus-arrow-divider -->
        <tr>
            <td align="center" bgcolor="#FFFFFF">
                <img style="width:100px;border:0px;display: inline!important; position: relative!important; top: -20px!important;"
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

                <!-- Content -->
                <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" class="row" width="580"
                    style="width:580px;max-width:580px;">
                  
                    <tr>
                        <td class="center-text" align="center"
                            style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:32px;line-height:42px;font-weight:400;font-style:normal;color:#282828;text-decoration:none;letter-spacing:0px;">

                            <div>
                                {{ __('Summary') }}
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <!-- 2-columns -->
                            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                                width="100%" style="width:100%;max-width:100%;">
                                <tr>
                                    <td align="center">
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" role="presentation"
                                            class="row" width="30" style="width:30px;max-width:30px;">
                                            <tr>
                                                <td height="20" style="font-size:20px;line-height:20px;"></td>
                                            </tr>
                                        </table>
                                        <!-- gap -->

                                        <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->

                                        <!-- column -->
                                        <table border="0" align="left" cellpadding="0" cellspacing="0" role="presentation"
                                            class="row" width="480" style="width:480px;max-width:480px;">
                                            <tr>
                                                <td class="" align="left"
                                                    style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:20px;line-height:28px;font-weight:400;font-style:normal;color:#343e9e;text-decoration:none;letter-spacing:0px;">

                                                    {!! $data['payload'] !!}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="5" style="font-size:5px;line-height:5px;">&nbsp;</td>
                                            </tr>
                                          
                                        </table>
                                        <!-- column -->

                                        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->

                                    </td>
                                </tr>
                            </table>
                            <!-- 2-columns -->
                        </td>
                    </tr>
                    <tr>
                        <td height="80" style="font-size:15px;line-height:15px;">&nbsp;</td>
                    </tr>
                </table>
                <!-- Content -->

            </td>
        </tr>
    </table>
@endsection