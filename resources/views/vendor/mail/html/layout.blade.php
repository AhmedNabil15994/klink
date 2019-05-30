<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body bgcolor="#3f3f3f" text="#919191" alink="#cccccc" vlink="#cccccc" style="margin: 0; padding: 0; background-color: #3f3f3f; color: #919191;">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
    <style type="text/css">
        body {
          margin: 0;
          padding: 0;
        }
    
        img {
          border: 0px;
          display: block;
        }
    
        .socialLinks {
          font-size: 6px;
        }
    
        .socialLinks a {
          display: inline-block;
        }
    
        .long-text p {
          margin: 1em 0px;
        }
    
        .long-text p:last-child {
          margin-bottom: 0px;
        }
    
        .long-text p:first-child {
          margin-top: 0px;
        }
      </style>
      <style type="text/css">
        /* yahoo, hotmail */
    
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%;
        }
    
        .yshortcuts a {
          border-bottom: none !important;
        }
    
        .vb-outer {
          min-width: 0 !important;
        }
    
        .RMsgBdy,
        .ExternalClass {
          width: 100%;
          background-color: #3f3f3f;
          background-color: #3f3f3f
        }
    
        /* outlook/office365 add buttons outside not-linked images and safari have 2px margin */
    
        [o365] button {
          margin: 0 !important;
        }
    
        /* outlook */
    
        table {
          mso-table-rspace: 0pt;
          mso-table-lspace: 0pt;
        }
    
        #outlook a {
          padding: 0;
        }
    
        img {
          outline: none;
          text-decoration: none;
          border: none;
          -ms-interpolation-mode: bicubic;
        }
    
        a img {
          border: none;
        }
    
        @media screen and (max-width: 600px) {
          table.vb-container,
          table.vb-row {
            width: 95% !important;
          }
    
          .mobile-hide {
            display: none !important;
          }
          .mobile-textcenter {
            text-align: center !important;
          }
    
          .mobile-full {
            width: 100% !important;
            max-width: none !important;
          }
        }
    
        /* previously used also screen and (max-device-width: 600px) but Yahoo Mail doesn't support multiple queries */
      </style>
      <style type="text/css">
        #ko_textBlock_1 .links-color a,
        #ko_textBlock_1 .links-color a:link,
        #ko_textBlock_1 .links-color a:visited,
        #ko_textBlock_1 .links-color a:hover {
          color: #3f3f3f;
          color: #3f3f3f;
          text-decoration: underline
        }
    
        #ko_textBlock_3 .links-color a,
        #ko_textBlock_3 .links-color a:link,
        #ko_textBlock_3 .links-color a:visited,
        #ko_textBlock_3 .links-color a:hover {
          color: #3f3f3f;
          color: #3f3f3f;
          text-decoration: underline
        }
    
        #ko_footerBlock_2 .links-color a,
        #ko_footerBlock_2 .links-color a:link,
        #ko_footerBlock_2 .links-color a:visited,
        #ko_footerBlock_2 .links-color a:hover {
          color: #cccccc;
          color: #cccccc;
          text-decoration: underline
        }
      </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    {{ $header ?? '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer ?? '' }}
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
