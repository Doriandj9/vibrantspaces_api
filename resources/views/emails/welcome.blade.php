@extends('layouts.mail')

@section('header.content')
<tr>
    <td align="center" class="center-text">
        <img style="width:190px;border:0px;display: inline!important;" src="{{ asset('assets/img/emails/Email-1_Intro.png') }}" width="190" border="0" alt="intro">
    </td>
</tr>
<tr>
    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
</tr>
<tr>
    <td class="center-text" align="center" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

        <div>
            {{ __('pleb.mail.Welcome') }}
        </div>

    </td>
</tr>
<tr>
    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
</tr>
<tr>
    <td class="center-text" align="center" style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;font-weight:300;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

        <div>
            {{ __('pleb.mail.Welcome Paragraph') }}
        </div>

    </td>
</tr>
<tr>
    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
</tr>
<tr>
    <td align="center">
        <!-- Header Button -->
        <table border="0" cellspacing="0" cellpadding="0" role="presentation" align="center" class="center-float">
            <tr>
                <td align="center" bgcolor="#d6df58" style="border-radius: 6px;">
                    <!--[if (gte mso 9)|(IE)]>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                    <tr>
                                                        <td align="center" width="50"></td>
                                                        <td align="center" height="50" style="height:50px;">
                                                <![endif]-->

                    <a href="{{ config('pleb.mail.welcome_url') }}" target="_blank" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:16px;line-height:19px;font-weight:700;font-style:normal;color:#000000;text-decoration:none;letter-spacing:0px;padding: 20px 50px 20px 50px;display: inline-block;"><span>{{ __('pleb.mail.action_button') }}</span></a>

                    <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                                <td align="center" width="50"></td>
                                                </tr>
                                                </table>
                                                <![endif]-->
                </td>
            </tr>
        </table>
        <!-- Header Button -->
    </td>
</tr>
@endsection

@section('arrow.content')
<table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;">
    <!-- lotus-arrow-divider -->
    <tr>
        <td align="center" bgcolor="#FFFFFF">
            <img style="width:50px;border:0px;display: inline!important;" src="{{ asset('assets/img/emails/Arrow.png') }}" width="50" border="0" alt="arrow">
        </td>
    </tr>
</table>
@endsection


@section('content')
<table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;">
    <!-- lotus-content-1-1 -->
    <tr>
        <td align="center" bgcolor="#FFFFFF" class="container-padding">

            <!-- Content -->
            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" class="row" width="580" style="width:580px;max-width:580px;">
                <tr>
                    <td height="50" style="font-size:50px;line-height:50px;">&nbsp;</td>
                </tr>
                <tr>
                    <td class="center-text" align="center" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:32px;line-height:42px;font-weight:400;font-style:normal;color:#282828;text-decoration:none;letter-spacing:0px;">

                        <div>
                            {{ __('What\'s Next') }}
                        </div>

                    </td>
                </tr>
                <tr>
                    <td height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">
                        <!-- 2-columns -->
                        <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="width:100%;max-width:100%;">
                            <tr>
                                <td align="center">

                                    <!--[if (gte mso 9)|(IE)]><table border="0" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

                                    <!-- column -->
                                    <table border="0" align="left" cellpadding="0" cellspacing="0" role="presentation" class="row" width="70" style="width:70px;max-width:70px;">
                                        <tr>
                                            <td align="center">
                                                <img style="display:block;width:100%;max-width:70px;border:0px;" width="70" src="{{ asset('assets/img/emails/Email-1_Icon-1.png') }}" border="0" alt="icon">
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- column -->

                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->

                                    <!-- gap -->
                                    <table border="0" align="left" cellpadding="0" cellspacing="0" role="presentation" class="row" width="30" style="width:30px;max-width:30px;">
                                        <tr>
                                            <td height="20" style="font-size:20px;line-height:20px;"></td>
                                        </tr>
                                    </table>
                                    <!-- gap -->

                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->

                                    <!-- column -->
                                    <table border="0" align="left" cellpadding="0" cellspacing="0" role="presentation" class="row" width="480" style="width:480px;max-width:480px;">
                                        <tr>
                                            <td class="center-text" align="left" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:20px;line-height:28px;font-weight:400;font-style:normal;color:#343e9e;text-decoration:none;letter-spacing:0px;">

                                                <div>
                                                    {{ __('pleb.mail.Headline One') }}
                                                </div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="5" style="font-size:5px;line-height:5px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="center-text container-padding" align="left" style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:14px;line-height:24px;font-weight:400;font-style:normal;color:#6e6e6e;text-decoration:none;letter-spacing:0px;">

                                                <div>
                                                    {{ __('pleb.mail.Paragraph One') }}
                                                </div>

                                            </td>
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
                    <td height="15" style="font-size:15px;line-height:15px;">&nbsp;</td>
                </tr>
            </table>
            <!-- Content -->

        </td>
    </tr>
</table>

@endsection