@extends('layouts.mail')

@section('header.content')
<tr>
    <td align="center" class="center-text">
        <img style="width:190px;border:0px;display: inline!important;" src="{{ asset('assets/img/emails/Email-2_Intro.png') }}" width="190" border="0" alt="intro">
    </td>
</tr>
<tr>
    <td height="30" style="font-size:40px;line-height:40px;">&nbsp;</td>
</tr>
<tr>
    <td class="center-text" align="center" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

        <div>
            {{ str_replace('@name','Vibran Essences LLC',__('pleb.mail.Hello, @name')) }}
        </div>

    </td>
</tr>
<tr>
    <td height="30" style="font-size:40px;line-height:40px;">&nbsp;</td>
</tr>
<tr>
    <td class="center-text" align="center" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:42px;line-height:52px;font-weight:400;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

        <div>
            {{ __('pleb.mail.Verify Title') }}
        </div>

    </td>
</tr>
<tr>
    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
</tr>
<tr>
    <td class="center-text" align="center" style="font-family:'Poppins',Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;font-weight:300;font-style:normal;color:#FFFFFF;text-decoration:none;letter-spacing:0px;">

        <div>
            <p>
                {{ __('pleb.mail.Step Confirm') }}
            </p>
            <p>
                {{ __('pleb.mail.Omit Email') }}
            </p>
            <p>
                {{ __('pleb.mail.Verify Your Email Account') }}
            </p>
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
                <td align="center" bgcolor="{{ config('pleb.custom.buttons.verify_email.bgcolor') }}" style="border-radius: 6px;">
                    <!--[if (gte mso 9)|(IE)]>
                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                    <tr>
                                                        <td align="center" width="50"></td>
                                                        <td align="center" height="50" style="height:50px;">
                                                <![endif]-->

                    <a href={{ $data['url']  }} target="_blank" style="font-family:'Roboto Slab',Arial,Helvetica,sans-serif;font-size:16px;line-height:19px;font-weight:700;font-style:normal;color:#000000;text-decoration:none;letter-spacing:0px;padding: 20px 50px 20px 50px;display: inline-block;">
                        <span>{{ __('pleb.mail.Verify Action Button') }}</span>
                    </a>

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