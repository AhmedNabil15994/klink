<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />


    <style type="text/css">

        @media only screen and (min-width: 601px) {
        .content {width: 600px !important;}
        .table2 {width: 600px !important;}
        .table3 {width: 600px !important;}
        }
        p{
            margin: 0 !important;
            margin-bottom: 5px !important;
        }
    </style>
</head>
<body style="padding: 0; margin: 0;">

    <table align="center" border="0" width="100%"   cellpadding="0" cellspacing="0"                                 style="border-collapse: collapse;">


        <tr>
            <td>
                <!--internal table-->
                <!--[if (gte mso 9)|(IE)]>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <![endif]-->
                                    <table class="content" style="width:100%;max-width:600px;border-collapse: collapse;" align="center" cellpadding="0" cellspacing="0">

                                        <tr>
                                            <td class="header" bgcolor="#f6ab36" align="center" style=
                                            "padding-top: 10px;padding-bottom: 10px; color: #FFFFFF; font-family: 'Raleway', sans-serif; font-size: 30px;cursor: pointer;
;                                            ">
                                                <a href="{{route('main')}}"><img src="{{url('images/logoFooter.png')}}" style="display:block" alt="logo"/></a>
                                            </td>
                                        </tr>


                                        <tr>
                                        <!--[if (gte mso 9)|(IE)]>
                                            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                              <tr>
                                                 <td>
                                                    <![endif]-->
                                                    <table class="tabel2" align="center" style="width:100%;max-width: 600px; padding-bottom: 25px;" border="0" cellpadding="0" cellspacing="0" bgcolor="#fdfdfd">


                                                        <tr>
                                                            <td align="center" style="font-family: 'Raleway', sans-serif; font-size: 30px;cursor: pointer;background: #fdfdfd; color:#31bbff;padding-top: 25px; padding-bottom: 25px;padding-left: 25px;padding-right: 25px;">
                                                                <img src="{{url('images/welcome.png')}}" alt="Message type picture" style="display: block; width: 100%;"/>
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td style="padding-top: 10px;padding-bottom: 10px;font-family: 'Raleway', sans-serif; font-size: 20px;cursor: pointer; color:#4e4e4e;font-weight: 700;" align="center">
                                                                {{$data['subject']}}
                                                            </td>



                                                        </tr>

                                                        <tr>
                                                            <td style="padding-top: 10px;padding-bottom: 10px;font-family: 'Raleway', sans-serif; font-size: 16px;cursor: pointer; color:#4e4e4e;line-height: 1.7;" align="left">
                                                                {!!html_entity_decode($data['content'])!!}
                                                            </td>
                                                        </tr>

                                                        @if(isset($data['code']))
                                                        <tr>

                                                            <td style="padding-top: 10px;padding-bottom: 10px;font-family: 'Raleway', sans-serif; font-size: 20px;cursor: pointer; color:#4e4e4e;font-weight: 700;" align="left">
                                                                <span style="background-color: #DDD;font-size: 30px;padding: 10px;">{{$data['code']}}</span>
                                                            </td>



                                                        </tr>
                                                        @endif

                                                        
                                                        
                                                        <tr>
                                                            <td  style="padding-top: 10px;padding-bottom: 10px;font-family: 'Raleway', sans-serif; font-size: 20px;cursor: pointer; color:#4e4e4e;line-height: 1.7;" align="center">
                                                                <a href="{{$data['url']}}" style="text-decoration: none; background: #31bbff; color:#FFFFFF; padding-top:10px; padding-left: 35px;
                                                                padding-right: 35px;padding-bottom: 10px; display: inline-block; border-radius: 5px;">
                                                                @if(!empty($data['url']))
                                                                    {{trans('frontend/order.download_attach')}}
                                                                @elseif(isset($data['link']))   
                                                                {{trans('frontend/dashboard.bind_offer')}}
                                                                @endif
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        
                                                        

                                                    </table>
                                                    <!--[if (gte mso 9)|(IE)]>
                                                    </td>
                                                </tr>
                                            </table>
                                        <![endif]-->
                                        </tr>


                                        <tr>
                                        <!--[if (gte mso 9)|(IE)]>
                                            <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                              <tr>
                                                 <td>
                                                    <![endif]-->
                                                    <table class="tabel3" align="center" style="width:100%;max-width: 600px;" border="0" cellpadding="0" cellspacing="0" >
                                                        <tr>
                                                             <td class="header" bgcolor="#f6ab36" align="center" style=
                                                                "padding-top: 10px;padding-bottom: 10px; color: #FFFFFF; font-family: 'Raleway', sans-serif; font-size: 16px;cursor: pointer;
                    ;                                            ">
                                                                Copyright &copy; {{\Carbon::now()->year}} Kurier-link
                                                        </tr>

    
                                                            
                                                    </table>
                                                    <!--[if (gte mso 9)|(IE)]>
                                                    </td>
                                                </tr>
                                            </table>
                                        <![endif]-->
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                            </td>
                        </tr>
                    </table>
                <![endif]-->
            <!--internal table-->
            </td>
        </tr>
       


        

      
    </table>

</body>
</html>