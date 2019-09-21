<?php
include 'include.php';
$username = $_SESSION['username'];
$query="SELECT * FROM users WHERE username = '$username'";
$results = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($results)) {
$veri = $row['verified'];
if($veri == '1') {
    ?>
<script type="text/javascript">
window.location.href = 'newsfeed.php';
</script>
<?php
}
}
?>
<?php
if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $hash = $_SESSION['hash'];
    $to      = $email; // Send email to our user
    $subject = 'Novice | Verification'; // Give the email a subject 
    $message = '

    Thanks for signing up!
    Your account has been created,
    Please click this link to activate your account:
    http://www.novicetopro.in/verify.php?email='.$email.'&hash='.$hash.'

'; // Our message above including the link
                 
$headers = 'From:noreply@novicetopro.in' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

?>
<script type="text/javascript">
window.location.href = 'verify_page.php';
</script>
<?php
}
?>
<?php
include 'include_profile.php';

session_start();
if ( $_SESSION['logged_in'] != 1 ) {
	echo "You must log in before viewing your profile page!";
	   
  }
else {
include 'include.php';
$username = $_SESSION['username'];
$query="SELECT * FROM answers WHERE answered_by IN (SELECT following FROM followers WHERE user1 = '$username')";
$results = mysqli_query($conn,$query);

?>


<!-- ... end Responsive Header -->

<div class="header-spacer"></div>
<!DOCTYPE html>
<!-- saved from url=(0068)https://login.mailchimp.com/signup/success/?username=kushagraagent47 -->
<html class="dj_webkit dj_chrome dj_contentbox"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <title>Success | Mailchimp</title>   <meta name="copyright" content="Copyright (c) 2019  All Rights Reserved."> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover"> <meta name="apple-mobile-web-app-capable" content="yes"> <meta name="apple-mobile-web-app-status-bar-style" content="black">  <meta content="//mailchimp.com/browserconfig.xml" name="msapplication-config"> <meta content="#FFE01B" name="msapplication-TileColor">  <link href="https://cdn-images.mailchimp.com/favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180"> <link href="https://cdn-images.mailchimp.com/favicons/touch-icon-192.png" rel="icon" sizes="192x192">  <link rel="shortcut icon" href="https://cdn-images.mailchimp.com/favicons/favicon.ico">  <link rel="mask-icon" href="https://cdn-images.mailchimp.com/favicons/mask-icon.svg" color="#241C15">  <link rel="stylesheet" type="text/css" href="./Success _ Mailchimp_files/typefaces.css"> <link rel="stylesheet" type="text/css" href="./Success _ Mailchimp_files/application.css">           <meta name="referrer" content="origin">   <script type="text/javascript" async="" src="./Success _ Mailchimp_files/f.txt"></script><script type="text/javascript" async="" src="./Success _ Mailchimp_files/insight.min.js"></script><script async="" src="./Success _ Mailchimp_files/main.4a81c615.js"></script><script src="./Success _ Mailchimp_files/ytc.js" async=""></script><script async="" src="./Success _ Mailchimp_files/core.js"></script><script async="" src="./Success _ Mailchimp_files/qevents.js"></script><script async="" src="./Success _ Mailchimp_files/analytics.js"></script><script src="./Success _ Mailchimp_files/bat.js" async=""></script><script type="text/javascript" async="" src="./Success _ Mailchimp_files/insight.min.js"></script><script async="" src="./Success _ Mailchimp_files/uwt.js"></script><script src="./Success _ Mailchimp_files/1592378257726461" async=""></script><script async="" src="./Success _ Mailchimp_files/fbevents.js"></script><script async="" src="./Success _ Mailchimp_files/gtm.js"></script><script mc:noreorder="">
    window.gtmData = {
        hasUser: false,
        userId: null,
        loginId: null,
        UA: "UA-329148-81",
        version: "1",
        gaDimensions: [],
        deferToGTM: false    };

    (function /* gtmAPI */ () {

        function buildCustomDimensions() {
            var result = { 9: window.gtmData.version.toString() };
            if(window.gtmData.hasUser) {
                result[8] = window.gtmData.userId.toString();
                result[24] = window.gtmData.loginId.toString();
            }

            var dims = window.gtmData.gaDimensions;
            Object.keys(dims).forEach(function(dim) {
                var index = parseInt(dim.replace('dimension', ''));
                if(!isNaN(index)) {
                    // sometimes things get into this array that are not numbered dimensions
                    result[index] = dims[dim];
                }
            });
            return result;
        }

        function gtmPayload(hitType, data) {
            data = data || {};

            data['_gtm_deferred'] = window.gtmData.deferToGTM;
            data['type'] = hitType;
            data['UA'] = window.gtmData.UA;
            data['customDimensions'] = buildCustomDimensions();

            data['customVariables'] = data['customVariables'] || {};
            data['customVariables']['eventSource'] = 'gtm';
            return data;
        }

        /**
         * Records a GTM event, with custom variables. Accepts either:
         *
         *   gtmEvent('event category', { 'foo': 'bar' })
         *
         * or:
         *
         *   gtmEvent({
         *     'eventCategory': 'event category',
         *     'eventAction': 'event action',
         *     'eventLabel': 'etc',
         *     'eventValue': 1
         *    }, { 'foo': 'bar' })
         *
         * For eventInfo guidelines see:
         *   https://support.google.com/analytics/answer/1033068?hl=en
         */
        window.gtmEvent = function(eventInfo, customVariables) {
            if(typeof eventInfo === 'string') {
                eventInfo = { 'eventCategory': eventInfo };
            }
            customVariables = customVariables || {};

            var event = gtmPayload('EVENT', {
                'event': 'e_action',
                'eventInfo': eventInfo,
                'customVariables': customVariables
            });

            window.dataLayer.push(event);
        };

        window.dataLayer = [gtmPayload('PAGE')];
    })();
</script>  <script mc:noreorder="">
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MCZTKL');
    // setup the GA command queue
    window['GoogleAnalyticsObject'] = '_ga';
    window._ga = window._ga || function() {
        window._ga.q = window._ga.q || [];
        window._ga.q.push(arguments);
    };
</script>


 <script mc:noreorder="">
    function debuglog() {
        if(typeof window._debug_analytics !== 'undefined' && window._debug_analytics) {
            console.log.apply(console, arguments);
        }
    }

    window.ga = function /*decoratedGoogleAnalytics*/() {
        var args = [].slice.call(arguments, 0);
        if (typeof args[0] === 'string'
            && args[0] !== 'create'
            && args[0] !== 'provide') {
            args[0] = 't0.' + args[0];
        }
        debuglog('ga', args);
        return _ga.apply(this, args);
    };

    (function /*initializeGoogleAnalytics*/() {
        var gtmData = window.gtmData;

        var dimensions = {
            USER_ID: 'dimension8',
            LOGIN_ID: 'dimension24',
            TRACKING_VERSION: 'dimension9'
        };

        function trackGA() {
            if (gtmData.hasUser) {
                ga("create", gtmData.UA, "auto", {
                    allowLinker: false,
                    userId: gtmData.userId,
                    name: 't0'
                });

                ga("set", dimensions.USER_ID, gtmData.userId.toString());
                ga("set", dimensions.LOGIN_ID, gtmData.loginId.toString());
            } else {
                ga("create", gtmData.UA, "auto", {
                    allowLinker: false,
                    name: 't0'
                });
            }
            ga("set", dimensions.TRACKING_VERSION, gtmData.version);

            ga("require","linker");
            ga("linker:autoLink", [/(.*\.)?mailchimp(app)?\.com$/], !1,!0);

            ga("send", "pageview", gtmData.gaDimensions);
        }

        if (!gtmData.deferToGTM) {
            trackGA();
        }
    })();
</script>         <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1592378257726461&ev=PageView&noscript=1"></noscript>       <noscript> <img height="2k width=" 1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=78584&fmt=gif"> </noscript>   <script type="text/javascript" src="./Success _ Mailchimp_files/jquery.min.js"></script><link type="text/css" href="./Success _ Mailchimp_files/optanon.css" rel="stylesheet"><style>#optanon ul#optanon-menu li { background-color:  !important }#optanon ul#optanon-menu li.menu-item-selected { background-color:  !important }#optanon #optanon-popup-wrapper .optanon-white-button-middle { background-color: #241C15 !important }.optanon-alert-box-wrapper .optanon-alert-box-button-middle { background-color: #241C15 !important; border-color: #241C15 !important; }#optanon #optanon-popup-wrapper .optanon-white-button-middle a { color: #ffffff !important }.optanon-alert-box-wrapper .optanon-alert-box-button-middle a { color: #ffffff !important }#optanon #optanon-popup-bottom { background-color: #241C15 !important }#optanon.modern #optanon-popup-top, #optanon.modern #optanon-popup-body-left-shading { background-color: #241C15 !important }.optanon-alert-box-wrapper { background-color:#241C15 !important }.optanon-alert-box-wrapper .optanon-alert-box-bg p { color:#FFFFFF !important }.optanon-alert-box-wrapper .optanon-alert-box-button-middle a {
    font-size: 11px;
    font-weight: 550;
}

.optanon-alert-box-wrapper .optanon-alert-box-corner-close {
    display: none;
}

.optanon-alert-box-wrapper .optanon-alert-box-bg p {
    padding-bottom: 10px;
}

.optanon-alert-box-wrapper .optanon-alert-box-body {
    padding-top: 10px;
}

.optanon-alert-box-wrapper .optanon-alert-box-button {
    margin: 0;
}

.optanon-alert-box-wrapper .optanon-alert-box-button-middle {
    border: none;
    background-color: transparent;
    padding: 0;
    font-weight: normal;
}

.optanon-alert-box-wrapper .optanon-button-more .optanon-alert-box-button-middle {
    line-height: 57px;
}

.optanon-alert-box-wrapper .optanon-button-more .optanon-alert-box-button-middle a:before {
    display: none;
}

.optanon-alert-box-wrapper .optanon-button-allow .optanon-alert-box-button-middle a:before {
    display: none;
}

.optanon-alert-box-wrapper .optanon-button-more .optanon-alert-box-button-middle {
    padding: 0;
    margin: 0 40px 0 0;
}

.optanon-alert-box-wrapper .optanon-alert-box-button-middle a.optanon-allow-all {
    padding-left: 30px;
    padding-right: 30px;
    line-height: 35px;
    margin: 0px !important;
    display: inline-block;
    height: 35px;
    top: 10px;
    border: 1px solid #fff;
}

.optanon-alert-box-bg .optanon-alert-box-button-container {
  right: 20px;
  margin-top: -28px;
}

#optanon #optanon-popup-bottom-logo:before {
    color: #fff;
}

#optanon #optanon-popup-bottom-logo:after {
    color: #fff;
}

#optanon #optanon-popup-body h2 {
    color: #fff;
}

@media only screen and (max-width: 47em) {
.optanon-alert-box-wrapper .optanon-alert-box-body {
        padding: 10px 0 20px 0;
        margin-right: 20px;
    }
}

@media only screen and (max-width: 751px) {
    #optanon #optanon-popup-body h2 {
        color: #000;
    }
}</style><script src="./Success _ Mailchimp_files/f(1).txt"></script><script src="./Success _ Mailchimp_files/f(2).txt"></script><style type="text/css" media="print">.usabilla_live_button_container { display: none; }</style></head><body id="login" class=" mcd selfclear overflow-auto"><div id="optanon" class="modern"><div id="optanon-popup-bg"></div><div id="optanon-popup-wrapper" role="dialog" aria-modal="true" tabindex="-1" lang="en-GB"><div id="optanon-popup-top"><a href="javascript:void(0);" onclick="Optanon.TriggerGoogleAnalyticsEvent(&#39;OneTrust Cookie Consent&#39;, &#39;Preferences Close Button&#39;);" aria-label="Close" class="optanon-close-link optanon-close optanon-close-ui" title="Close"><div id="optanon-close" style="background: url(https://cdn.cookielaw.org/skins/3.6.25/default_flat_bottom_two_button_white/v2/images/optanon-pop-up-close.png);width:34px;height:34px;"></div></a></div><div id="optanon-popup-body"><div id="optanon-popup-body-left"><div id="optanon-popup-body-left-shading"></div><div id="optanon-branding-top-logo" style="background-image: url(https://cdn.cookielaw.org/logos/3030/3030:login.mailchimp.com/MC-Horizontal-Reverse-Transparent.png) !important;"></div><ul id="optanon-menu" aria-label="Navigation Menu"><li class="menu-item-on menu-item-about" title="How Mailchimp Uses Cookies"><h2 class="preference-menu-item"><a href="javascript:void(0);">How Mailchimp Uses Cookies</a></h2></li><li class="menu-item-necessary menu-item-on" title="Essential Website Cookies"><h2 class="preference-menu-item"><a href="javascript:void(0);">Essential Website Cookies</a></h2></li><li class="menu-item-on menu-item-performance" title="Performance and Functionality Cookies"><h2 class="preference-menu-item"><a href="javascript:void(0);">Performance and Functionality Cookies</a></h2></li><li class="menu-item-on menu-item-advertising" title="Advertising (Targeting) Cookies"><h2 class="preference-menu-item"><a href="javascript:void(0);">Advertising (Targeting) Cookies</a></h2></li><li class="menu-item-moreinfo menu-item-off" title="Cookie Statement"><h2 class="preference-menu-item"><a target="_blank" href="https://mailchimp.com/legal/cookies/" onclick="Optanon.TriggerGoogleAnalyticsEvent(&#39;OneTrust Cookie Consent&#39;, &#39;Preferences Cookie Policy&#39;);">Cookie Statement</a></h2></li></ul></div><div id="optanon-popup-body-right"><h1 class="legacy-preference-banner-title" aria-label="Privacy Preference Center">Privacy Preference Center</h1><div class="vendor-header-container"><h3></h3><div id="optanon-popup-more-info-bar"><div class="optanon-status"><div class="optanon-status-editable"><form><fieldset><p><input type="checkbox" aria-checked="false" value="check" id="chkMain" checked="" class="legacy-group-status optanon-status-checkbox"><label for="chkMain">Active</label></p></fieldset></form></div><div class="optanon-status-always-active optanon-status-on"><p>Always Active</p></div></div></div></div><div id="optanon-main-info-text"></div></div><div class="optanon-bottom-spacer"></div></div><div id="optanon-popup-bottom"> <a href="https://onetrust.com/poweredbyonetrust" target="_blank"><div id="optanon-popup-bottom-logo" style="background: url(https://cdn.cookielaw.org/skins/3.6.25/default_flat_bottom_two_button_white/v2/images/cookie-collective-top-bottom.png);width:155px;height:35px;" title="powered by OneTrust"></div></a><div class="optanon-button-wrapper optanon-save-settings-button optanon-close optanon-close-consent"><div class="optanon-white-button-left"></div><div class="optanon-white-button-middle"><a href="javascript:void(0);" title="Save Settings" aria-label="Save Settings" onclick="Optanon.TriggerGoogleAnalyticsEvent(&#39;OneTrust Cookie Consent&#39;, &#39;Preferences Save Settings&#39;);">Save Settings</a></div><div class="optanon-white-button-right"></div></div><div class="optanon-button-wrapper optanon-allow-all-button optanon-allow-all" style="display: none;"><div class="optanon-white-button-left"></div><div class="optanon-white-button-middle"><a href="javascript:void(0);" title="Allow All" aria-label="Allow All" onclick="Optanon.TriggerGoogleAnalyticsEvent(&#39;OneTrust Cookie Consent&#39;, &#39;Preferences Allow All&#39;);">Allow All</a></div><div class="optanon-white-button-right"></div></div></div></div></div><div style="display: none;" id="lightningjs-usabilla_live"><div><iframe frameborder="0" id="lightningjs-frame-usabilla_live" src="./Success _ Mailchimp_files/saved_resource(2).html"></iframe></div></div><div style="display: none; visibility: hidden;">  </div>      <noscript> <iframe src="img/author-main1.jpg" height="0" width="0" style="display:none;visibility:hidden"> </iframe> </noscript>     <div class="main-content mc-content">  <div id="browser-warning" class="feedback-block warning" style="display: none;"> <div class="lastUnit size1of1"> <div class="media"> <div class="media-image"><span class="freddicon warn-circle"></span></div> <div class="media-body"></div> </div> </div> </div>  <div id="no-cookies" class="feedback-block warning" style="display: none;"> <div class="lastUnit size1of1 alignc"> <span class="freddicon warn-circle margin--lv2 !margin-top-bottom--lv0 !margin-left--lv0"></span> <span>It looks like you have cookies disabled.</span> <span>Cookies need to be enabled for Mailchimp to work properly.</span> </div> </div> <div id="content">  <div class="centered margin--lv8 padding--lv6 !margin-bottom--lv0 !padding-bottom--lv0 nomargin--tablet nopadding--tablet c-signupWrapper"> <div class="line c-signupContent centered"> <div class="unit size1of3 full-width-mobile"> <div data-mc-el="freddie" class=" freddie margin--lv6 !margin-bottom--lv2 !margin-left--lv0 !margin-right--lv0"></div> </div> <div class="lastUnit size2of3 nofloat-tablet full-width-mobile mar-lr-auto--tablet float-left">    <div id="signup-content" class="line selfclear !margin-bottom--lv8"> <div class="signup-wrap"> <div class="line section"> <div class="lastUnit size1of1"> <h1 class="!margin-bottom--lv3 no-transform center-on-medium">Check your email</h1> <p class="margin-bottom--lv5">We’ve sent a message to <strong><?php echo $_SESSION['email']; ?></strong> with a link to activate your account.</p> <label class="disclosure-closed margin-bottom--lv2" onclick="mojo.utils.disclosureElement(&#39;disclose-this&#39;, this, true); return false;"></label> <div id="disclose-this" style="display:none;"> <p class="margin-bottom--lv5">If you don’t see an email from us within a few minutes, a few things could have happened:</p> <ul class="disc margin-bottom--lv7"> <li>The email is in your spam folder. (Sometimes things get lost in there.)</li> <li>The email address you entered had a mistake or typo. (Happens to the best of us.)</li> <li>You accidentally gave us another email address. (Usually a work or personal one instead of the one you meant.)</li> <li>We can’t deliver the email to this address. (Usually because of corporate firewalls or filtering.)</li> </ul> <p><a href="https://login.mailchimp.com/signup/resend-activation?username=kushagraagent47">Re-enter your email and try again</a></p> </div> </div> </div> </div>    <noscript> <div style="display:inline;"> <img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1066381306/?value=0&amp;label=59A5CK70RhD63778Aw&amp;guid=ON&amp;script=0"> </div> </noscript>  <noscript><img src="https://bat.bing.com/action/0?ti=4058566&Ver=2" height="0" width="0" style="display:none; visibility: hidden;"></noscript> </div> </div> </div> </div>  <div class="centered margin--lv8 padding--lv6 !margin-top-bottom--lv0 !padding-top--lv0 nomargin--tablet nopadding--tablet hide-print"> <div class="line c-signupContent centered "> <div class="unit size1of3 hide-mobile"> &nbsp; </div> <div class="lastGroup size2of3 nofloat-tablet full-width-mobile mar-lr-auto--tablet"> <p class="c-legalNotice lastUnit size1of1 full-width"> ©2001–2019 All Rights Reserved. Mailchimp® is a registered trademark of The Rocket Science Group. <a class="nowrap link-underline textcolor--secondary" href="https://mailchimp.com/legal/cookies/" target="_blank" tabindex="-1" mc:track="" data-dojo-type="mojo/widgets/OneTrustModal" rel="noopener noreferrer" id="dijit__WidgetBase_0" widgetid="dijit__WidgetBase_0">Cookie Preferences</a>, <a class="textcolor--secondary" href="http://mailchimp.com/legal/privacy" target="_blank" tabindex="-1" mc:track="" rel="noopener noreferrer">Privacy</a>, and <a class="textcolor--secondary" href="http://mailchimp.com/legal/" target="_blank" tabindex="-1" mc:track="" rel="noopener noreferrer">Terms</a>. </p>  </div> </div> </div> </div> </div> <script type="text/javascript">
    var xhr_open = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function(method, url, async, user, password) {
        xhr_open.call(this, method, url, async, user, password);
        if (url.match(/^\/(?!\/)+/)) {
            this.setRequestHeader('X-CSRF-Token', 'b30a4b6418415458d843f71326ef80890ae20403');
        }
    }
</script><script src="./Success _ Mailchimp_files/dojo.js" data-dojo-config="parseOnLoad: true, usePlainJson: true, isDebug: false"></script><script src="./Success _ Mailchimp_files/mccommon.js"></script><script type="text/javascript">
    // The following dojo require places mojo.utils on the window.
    // Many html files and javascript views rely on this property existing.
    // Search for "mojo.utils" in any *.html files, and you'll find the hundreds of cases.
    // Leaving this for historical reasons, but eventually migrating those usages would be good.
    dojo.require("mojo.utils");

    require(["mojo/widgets/Dialog"]);

    // Leaving it globally since we used it around
    window.rootUrl = '/';

    require([
        "dojo/query",
    ], function (query) {
        // captcha takes a global function to callback
        window.captchaSuccess = function () {
            query('[data-mc-el="captchaAutoSubmit"]')[0].submit();
        };
    });

    require([
        "dojo/_base/lang",
        "mojo/user",
        "mojo/context",
    ], function (lang, user, context) {
        // Add defaults to the actual modules.

        lang.mixin(context, {
            'rootUrl': '/',

            'proxyBaseUrl': "https:\/\/d2q0qd5iz04n9u.cloudfront.net\/_ssl\/proxy.php",

            'listManageDomain': "list-manage.com",

            'pusherKey': "74d7188a67461f12439a",

            'cdnImagesDomain': "cdn-images.mailchimp.com",

            'galleryDomain': "gallery.mailchimp.com",

            'avestaEnvironment': "prod",

            "imageEditorUrl": "https:\/\/dme0ih8comzn4.cloudfront.net\/imaging\/v3\/editor.js",

            "imageEditorKey": "0e6dcf36c54b4faf965e45884a3dcf30",

            "solvvyUrl": "\/js\/vendor\/solvvy\/solvvy.js",

            "enabledFlags": ["logging_migrate_avesta_log","mcadmin_okta","bcrypt","api30_onerror_bugsnag_fix","partner_platform_api_utma","partner_platform_api_root_ping","googleads_use_latest_version","retry_login_cacheclient","eventbrite_affiliate_links","remove_login_flashblock","mc.lock_waited"],
        });

        
    });
        require([
        "vendor/bugsnag/bugsnag",
        "mojo/user",
    ], function (bugsnag, user) {
        bugsnag.endpoint = "https:\/\/bugsnag-notify.rsglab.com\/js";
        bugsnag.apiKey = "29f7c1fcbc19f93274b6fae7d4ab0aa1";
        bugsnag.autoNotify = true;
        bugsnag.user = {
            id: user.userId,
            type: user.type,
        };
        bugsnag.appVersion = user.appVersion;
    });

    require([
        "dojo/Deferred",
        "vendor/bugsnag/bugsnag",
    ], function (Deferred, bugsnag) {
        Deferred.instrumentRejected = function (error, handled, rejection, deferred) {
            if (handled === true) {
                return;
            }

            if (typeof error === "string") {
                bugsnag.notify(error);
            } else if (error instanceof Error) {
                bugsnag.notifyException(error);
            } else {
                bugsnag.notify("UnhandledDeferredRejection", error);
            }
        };
    });
    </script><script type="text/javascript">
    dojo.require('dojo.parser');
    dojo.require("dojo.NodeList-traverse");
    dojo.require('dojo.cookie');
    dojo.require('dijit.form.CheckBox');
    dojo.require('mojo.widgets.BrowserWarnings');
    dojo.require('dojo/dom');

    dojo.addOnLoad(function() {
        // Show password code that works for more than one password field in the page.
        if(dojo.query('[name="show-password"]').length > 0) {
            var input_password_arr = dojo.query('input[type="password"]');
            dojo.forEach(dojo.query('[name="show-password"]'),function(el, i){
                    el.index = i;
                    dojo.connect(el, "click", function(evt){
                        showPass(input_password_arr, evt);
                    });//eo onclick evt;
            });
        }

        //If more than one password field is in the page this function
        // allows to keep the behaviors of the show password tick separate from one another
        function showPass(input_password, ev){
            var el = ev.target;
            var showPassword = dojo.query('[data-mc-el="showPassword"]')[0];
            dojo.forEach(input_password, function(pwdinput, i){
                if(i===el.index) {
                    if(el.checked){
                        dojo.attr(pwdinput,"type","text");
                        dojo.attr(pwdinput,"autocomplete","off");
                        dojo.attr(pwdinput,"autocorrect","off");
                        dojo.attr(pwdinput,"autocapitalize","off");
                        dojo.attr(pwdinput,"spellcheck","false");
                        pwdinput.focus();
                        // show/hide password toggle on signup pg
                        if(showPassword){
                            showPassword.innerHTML = "Hide";
                            dojo.addClass(showPassword, "c-showPassword--hideIcon");
                            dojo.removeClass(showPassword, "c-showPassword--showIcon");
                        }
                    }
                    else{
                        dojo.attr(pwdinput,"type","password"); pwdinput.focus();
                        // show/hide password toggle on signup pg
                        if(showPassword){
                            showPassword.innerHTML = "Show";
                            dojo.addClass(showPassword, "c-showPassword--showIcon");
                            dojo.removeClass(showPassword, "c-showPassword--hideIcon");
                        }
                    }
                }
            }); //eo forEach
        }

        
        document.onkeypress=function(e){
            var keycode = (e==null) ? keycode = event.keyCode : ((keycode = e.which));
            var targetEl;
            var shift_status = false;
            if(dojo.isIE){
                targetEl = event.srcElement;
                shift_status = event.shiftKey;
            }else{
                if(e.target){
                    targetEl = e.target;
                }else if(e.srcElement){
                    targetEl = e.srcElement;
                }

                if(e.shiftKey){
                    shift_status = e.shiftKey;
                }else if(e.modifiers){
                    shift_status = !!(e.modifiers & 4);
                }
            }
            if((keycode >= 65 && keycode <= 90 ) || (keycode >= 97 && keycode <= 122) && shift_status){
                dojo.addClass(targetEl, 'caps');
            }else{
                dojo.removeClass(targetEl, 'caps');
            }
        }

            });


    /** Password Requirements **/
    require([
        "dojo/dom",
        "dojo/query",
        "dojo/dom-class",
        "dojo/dom-attr",
        "dojo/dom-style",
        "dojo/on",
        "dijit/registry",
        "mojo/utils",
        "dojo/ready"
    ], function(dom, query, domClass, domAttr, domStyle, on, registry, utils, ready){

        // At least one LOWERCASE character:
        var lowerCasePattern = /^(?=.*[a-z]).+$/;

        // At least one UPPERCASE character:
        var upperCasePattern = /^(?=.*[A-Z]).+$/;

        // At least one NUMBER:
        var numberPattern = /^(?=.*[\d]).+$/;

        // At least one SPECIAL character:
        var specialCharacterPatter = /([-+=_!@#$%^&*.,;:'\"<>/?`~\[\]\(\)\{\}\\\|\s])/;

        // At least 8 characters in the screen:
        var characterCountPattern = /^.{8,}/;

        // Flag to keep track if password is less than 50 characters:
        var isLessThan50 = true;

        ready(function(){

            var pwd = dom.byId("new_password");
            var passReq = query(".password-requirements")[0];

            if(dom.byId("create-account")){
                var createBtn = dom.byId("create-account");
            }

            if(dom.byId("join-account")){
                var joinBtn = dom.byId("join-account");
            }

            if(registry.byId("reset-password")){
                var resetBtn = registry.byId("reset-password");
                resetBtn.setDisabled(true);
            }

            var lowercaseChar = query(".lowercase-char")[0];
            var uppercaseChar = query(".uppercase-char")[0];
            var numberChar = query(".number-char")[0];
            var specialChar = query(".special-char")[0];
            var _8Char = query(".8-char")[0];
            var plus50 = query(".plus-50")[0];

            // Attach event for signup form
            if(dom.byId("signup-form")) {
                checkRequirements();
                on(dom.byId("signup-form"), "submit", function (e) {
                    // Add loading animation to button
                    utils.toggleButtonLoadingState(createBtn);
                });
            }

            // Attach event for invite form
            if(dom.byId("login-form")) {
                on(dom.byId("login-form"), "submit", function (e) {
                    // get button by submit
                    var submitButton = e.target.querySelector("[type=\"submit\"]");
                    // Add loading animation to button
                    if (submitButton) {
                        utils.toggleButtonLoadingState(submitButton);
                    }
                });
            }

            // Attach event for reset password form
            if(dom.byId("reset-password-form")) {
                on(dom.byId("reset-password-form"), "submit", function (e) {
                    // Add loading animation to button
                    utils.toggleButtonLoadingState(resetBtn);
                });
            }

            // focus/focusout events for new password
            if(passReq && !domClass.contains(passReq, "always-open")){
                on(dom.byId("new_password"), "focus", function(){
                    domClass.add(passReq, "open");
                });

                on(dom.byId("new_password"), "focusout", function(){
                    domClass.remove(passReq, "open");
                });
            }

           // Event for change of input (typing, pasting)
            if(pwd){ on(pwd, "input", function(e) { checkRequirements(); }); }

            function checkRequirements(){
                toggleRequirements(pwd, lowerCasePattern, lowercaseChar);
                toggleRequirements(pwd, upperCasePattern, uppercaseChar);
                toggleRequirements(pwd, numberPattern, numberChar);
                toggleRequirements(pwd, specialCharacterPatter, specialChar);
                toggleRequirements(pwd, characterCountPattern, _8Char);

                // Check if password is 50 chars or longer
                if(pwd.value.length > 50){
                    domStyle.set(plus50, "opacity", "1");
                    isLessThan50 = false;
                }else{
                    domStyle.set(plus50, "opacity", "0");
                    isLessThan50 = true;
                }

                if( lowerCasePattern.test(pwd.value) &&
                        upperCasePattern.test(pwd.value) &&
                        numberPattern.test(pwd.value) &&
                        specialCharacterPatter.test(pwd.value) &&
                        characterCountPattern.test(pwd.value) &&
                        isLessThan50
                        ){
                    domClass.remove(query(".password-ok")[0], "hide");
                    domClass.add(passReq, "hide");
                    if(createBtn){ domAttr.remove(createBtn, "disabled"); }
                    if(joinBtn){ domAttr.remove(joinBtn, "disabled"); }
                    if(resetBtn){ resetBtn.setDisabled(false); }
                }else{
                    domClass.add(query(".password-ok")[0], "hide");
                    if(createBtn){ domAttr.set(createBtn, "disabled", "disabled"); }
                    if(joinBtn){ domAttr.set(joinBtn, "disabled", "disabled"); }
                    if(resetBtn){ resetBtn.setDisabled(true); }
                    domClass.remove(passReq, "hide");
                }
            }

            function toggleRequirements(/*input*/pwd, /*RegEx*/regEx, /*element*/el){
                if(regEx.test(pwd.value) ){
                    domClass.add(el, "completed");
                }else{
                    domClass.remove(el, "completed");
                }
            }

        });
    });

</script><script src="./Success _ Mailchimp_files/aa5d1d12-198d-44fa-8bcc-f8ee6459cd15.js" type="text/javascript" charset="UTF-8"></script><script type="text/javascript">
    (function () {
        function getCookie(check_name) {
            var a_all_cookies = document.cookie.split(';');
            var a_temp_cookie = '';
            var cookie_name = '';
            var cookie_value = '';
            var b_cookie_found = false;

            for (i = 0; i < a_all_cookies.length; i++) {
                a_temp_cookie = a_all_cookies[i].split('=');
                cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
                if (cookie_name === check_name) {
                    b_cookie_found = true;
                    if (a_temp_cookie.length > 1) {
                        cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
                    }
                    return cookie_value;
                }
                a_temp_cookie = null;
                cookie_name = '';
            }

            if (!b_cookie_found) {
                return null;
            }
        }
        // Save tracking id and client id to a cookie so we can use them server side
        setTimeout(function () {
            if (!getCookie('_mcga')) {
                ga(function (tracker) {
                    var gaData = {
                        tid: tracker.get('trackingId'),
                        cid: tracker.get('clientId')
                    };
                    document.cookie = '_mcga=' + JSON.stringify(gaData) + ';path=/;domain=.mailchimp.com';
                });
            }
        }, 1);
    })();
</script><script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1592378257726461');
fbq('track', 'PageView');
fbq('track', 'Lead');
</script><script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// MC
twq('init','nvidh');
twq('track','PageView');

// Agency
twq('init','ny3f6');
twq('track','PageView');
</script><script type="text/javascript">
_linkedin_data_partner_id = "78584";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script><script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<img width="1" height="1" border="0" src="https://d.agkn.com/pixel/7902/?che=' + a + '&type=ES47"/>');
</script><img width="1" height="1" border="0" src="./Success _ Mailchimp_files/saved_resource"><script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1066381306;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "59A5CK70RhD63778Aw";
        var google_conversion_value = 0;
        /* ]]> */
    </script><script type="text/javascript" src="./Success _ Mailchimp_files/f(3).txt">
    </script><script>(function(w,d,t,r,u){ var f,n,i;w[u]=w[u]||[],f=function(){ var o={ ti:"4058566" };o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad") },n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){ var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null) },i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i) })(window,document,"script","https://bat.bing.com/bat.js","uetq");</script> 
<iframe height="0" width="0" style="display: none; visibility: hidden;" src="./Success _ Mailchimp_files/activityi.html"></iframe><div style="width:0px; height:0px; display:none; visibility:hidden;" id="batBeacon0.395913029512843"><img style="width:0px; height:0px; display:none; visibility:hidden;" id="batBeacon0.930939192871179" width="0" height="0" alt="" src="./Success _ Mailchimp_files/0"><img style="width:0px; height:0px; display:none; visibility:hidden;" id="batBeacon0.5535540491869924" width="0" height="0" alt="" src="./Success _ Mailchimp_files/0(1)"></div><div style="display: none; visibility: hidden;"><script>if("0000"!=google_tag_manager["GTM-MCZTKL"].macro(1)){var axel=Math.random()+"",a=1E13*axel;document.write('\x3cimg width\x3d"1" height\x3d"1" border\x3d"0" src\x3d"https://d.agkn.com/pixel/7902/?che\x3d'+a+"\x26type\x3d"+google_tag_manager["GTM-MCZTKL"].macro(2)+'"/\x3e')};</script></div><script type="text/javascript" id="">(function(a,e,f,g,b,c,d){a.GoogleAnalyticsObject=b;a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)};a[b].l=1*new Date;c=e.createElement(f);d=e.getElementsByTagName(f)[0];c.async=1;c.src=g;d.parentNode.insertBefore(c,d)})(window,document,"script","//www.google-analytics.com/analytics.js","_ga");var i,l;
for(i=1;4>i;i++)document.querySelector("div:nth-child(5) \x3e div:nth-child(2) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a")&&(l=document.querySelector("div:nth-child(5) \x3e div:nth-child(2) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a").innerText,document.querySelector("div:nth-child(5) \x3e div:nth-child(2) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a").addEventListener("click",getcta(l)));
for(i=1;3>i;i++)document.querySelector("div:nth-child(5) \x3e div:nth-child(3) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a")&&(l=document.querySelector("div:nth-child(5) \x3e div:nth-child(3) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a").innerText,document.querySelector("div:nth-child(5) \x3e div:nth-child(3) \x3e div:nth-child("+i+") \x3e p.margin-bottom--lv1 \x3e a").addEventListener("click",getcta(l)));
function getcta(a){return function(){ga("send",{hitType:"event",eventCategory:"Navigation",eventAction:"Shortcuts to Helpful Stuff",eventLabel:a})}};</script>

<script type="text/javascript" id="">!function(d,e,f,a,b,c){d.qp||(a=d.qp=function(){a.qp?a.qp.apply(a,arguments):a.queue.push(arguments)},a.queue=[],b=document.createElement(e),b.async=!0,b.src=f,c=document.getElementsByTagName(e)[0],c.parentNode.insertBefore(b,c))}(window,"script","https://a.quora.com/qevents.js");qp("init","c1e5254d860643ff9559eb651f1eecf4");qp("track","ViewContent");</script>
<noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/c1e5254d860643ff9559eb651f1eecf4/pixel?tag=ViewContent&amp;noscript=1"></noscript>


<script type="text/javascript" id="">qp("track","GenerateLead");</script><script type="text/javascript" id="">var cat="Bing UET",act="undefined"===typeof User?"(not set)":User.userLevel;
"object"!=typeof uetq&&function(b,c,e,f,d){b[d]=b[d]||[];var g=function(){var a={ti:"4058566"};a.q=b[d];b[d]=new UET(a);b[d].push("pageLoad")};var a=c.createElement(e);a.src=f;a.async=1;a.onload=a.onreadystatechange=function(){var b=this.readyState;b&&"loaded"!==b&&"complete"!==b||(g(),a.onload=a.onreadystatechange=null)};c=c.getElementsByTagName(e)[0];c.parentNode.insertBefore(a,c)}(window,document,"script","//bat.bing.com/bat.js","uetq");window.uetq=window.uetq||[];window.uetq.push({ec:cat,ea:act});</script><div style="display: none; visibility: hidden;">
<script>!function(b){if(!window.pintrk){window.pintrk=function(){window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var a=window.pintrk;a.queue=[];a.version="3.0";a=document.createElement("script");a.async=!0;a.src=b;b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}("https://s.pinimg.com/ct/core.js");pintrk("load","2613345057535",{em:"\x3cuser_email_address\x3e"});pintrk("page");</script>
<noscript></noscript>
</div><div style="display: none; visibility: hidden;"> <script src="./Success _ Mailchimp_files/up_loader.1.1.0.js" type="text/javascript"></script>
        <script type="text/javascript">ttd_dom_ready(function(){if("function"===typeof TTDUniversalPixelApi){var a=new TTDUniversalPixelApi;a.init("04ojwu0",["dsne1w6"],"https://insight.adsrvr.org/track/up")}});</script></div><script type="text/javascript" id="">pintrk("track","signup-free");</script><div style="display: none; visibility: hidden;">
<script type="text/javascript">_linkedin_data_partner_id="78584";</script><script type="text/javascript">(function(){var b=document.getElementsByTagName("script")[0],a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="https://snap.licdn.com/li.lms-analytics/insight.min.js";b.parentNode.insertBefore(a,b)})();</script>
<noscript></noscript>
</div><div style="display: none; visibility: hidden;">
<script>!function(d,e,f,a,b,c){d.twq||(a=d.twq=function(){a.exe?a.exe.apply(a,arguments):a.queue.push(arguments)},a.version="1.1",a.queue=[],b=e.createElement(f),b.async=!0,b.src="//static.ads-twitter.com/uwt.js",c=e.getElementsByTagName(f)[0],c.parentNode.insertBefore(b,c))}(window,document,"script");twq("init","ny3f6");twq("track","PageView");</script>
</div><div style="display: none; visibility: hidden;">
<script>!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","1592378257726461");fbq("track","PageView");</script>
<noscript></noscript>
</div>
<script type="text/javascript" id="" src="./Success _ Mailchimp_files/js"></script><meta name="google-site-verification" content="V4mQVza_GHx-KlR9WJk9sfwrPDxEyYVZ8eNj9jyAU_g"><div style="display: none; visibility: hidden;"><script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "https://mailchimp.com",
  "logo": "https://www.dexigner.com/images/news/xxi/31385.jpg",
  "name": "Mailchimp"
}
</script></div><script type="text/javascript" id="">(function(d,a,b,f,e){d[e]=d[e]||[];d[e].push({projectId:"10000",properties:{pixelId:"10005633"}});var c=a.createElement(b);c.src=f;c.async=!0;c.onload=c.onreadystatechange=function(){var a=this.readyState,c=d[e];if(!a||"complete"==a||"loaded"==a)try{var b=YAHOO.ywa.I13N.fireBeacon;d[e]=[];d[e].push=function(a){b([a])};b(c)}catch(g){}};a=a.getElementsByTagName(b)[0];b=a.parentNode;b.insertBefore(c,a)})(window,document,"script","https://s.yimg.com/wi/ytc.js","dotq");</script><div style="display: none; visibility: hidden;">

<script type="text/javascript">window.lightningjs||function(c){function a(a,d){d&&(d+=(/\?/.test(d)?"\x26":"?")+"lv\x3d1");c[a]||function(){var g=window,e=document,k=a,h=e.location.protocol,m="load",r=0;(function(){function a(){b.P(m);b.w=1;c[k]("_load")}c[k]=function(){function a(){a.id=l;return c[k].apply(a,arguments)}var l=++r;var e=this&&this!=g?this.id||0:0;(b.s=b.s||[]).push([l,e,arguments]);a.then=function(c,e,n){var d=b.fh[l]=b.fh[l]||[],k=b.eh[l]=b.eh[l]||[],f=b.ph[l]=b.ph[l]||[];c&&d.push(c);e&&k.push(e);n&&f.push(n);
return a};return a};var b=c[k]._={};b.fh={};b.eh={};b.ph={};b.l=d?d.replace(/^\/\//,("https:"==h?h:"http:")+"//"):d;b.p={0:+new Date};b.P=function(a){b.p[a]=new Date-b.p[0]};b.w&&a();g.addEventListener?g.addEventListener(m,a,!1):g.attachEvent("on"+m,a);var t=function(){function a(){return["\x3chead\x3e\x3c/head\x3e\x3c",c,' onload\x3d"var d\x3d',q,";d.getElementsByTagName('head')[0].",h,"(d.",g,"('script')).",n,"\x3d'",b.l,"'\"\x3e\x3c/",c,"\x3e"].join("")}var c="body",d=e[c];if(!d)return setTimeout(t,
100);b.P(1);var h="appendChild",g="createElement",n="src",m=e[g]("div"),r=m[h](e[g]("div")),f=e[g]("iframe"),q="document";m.style.display="none";d.insertBefore(m,d.firstChild).id=p+"-"+k;f.frameBorder="0";f.id=p+"-frame-"+k;/MSIE[ ]+6/.test(navigator.userAgent)&&(f[n]="javascript:false");f.allowTransparency="true";r[h](f);try{f.contentWindow[q].open()}catch(w){b.domain=e.domain;var u="javascript:var d\x3d"+q+".open();d.domain\x3d'"+e.domain+"';";f[n]=u+"void(0);"}try{var v=f.contentWindow[q];v.write(a());
v.close()}catch(w){f[n]=u+'d.write("'+a().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}b.P(2)};b.l&&setTimeout(t,0)})()}();c[a].lv="1";return c[a]}var p="lightningjs",h=window[p]=a(p);h.require=a;h.modules=c}({});navigator.userAgent.match(/Android|BlackBerry|BB10|iPhone|iPad|iPod|Opera Mini|IEMobile/i)?window.usabilla_live=lightningjs.require("usabilla_live","//w.usabilla.com/4357abbfab53.js"):window.usabilla_live=lightningjs.require("usabilla_live","//w.usabilla.com/9f583da56bce.js");
window.usabilla_live("data",{custom:{UserID:google_tag_manager["GTM-MCZTKL"].macro(3)}},"setEventCallback",function(c,a,p){"Feedback:Open"===a&&(document.cookie="campaign_complete\x3d1;path\x3d/")});</script></div>
<script type="text/javascript" id="">window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date);gtag("config","AW-782980185");</script>
<script type="text/javascript" id="">gtag("track","signup-free",{send_to:"AW-782980185/-I9CCMGRu4sBENmorfUC"});</script>
 
<script type="application/javascript" id="ywa-1550286585043-516914" class="ywa-10000" defer="" src="./Success _ Mailchimp_files/sp.pl.download"></script><script src="./Success _ Mailchimp_files/saved_resource(1)" type="text/javascript"></script><script src="./Success _ Mailchimp_files/adsct" type="text/javascript"></script><script src="./Success _ Mailchimp_files/adsct(1)" type="text/javascript"></script><script src="./Success _ Mailchimp_files/adsct(1)" type="text/javascript"></script><div class="usabilla_live_button_container" tabindex="0" style="top:50%;margin-top:-65px;width:40px;height:130px;position:fixed;z-index:999;right:0" aria-label="Usabilla Feedback Button"><iframe src="./Success _ Mailchimp_files/saved_resource(3).html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" data-tags="right" title="Usabilla Feedback Button" style="width: 40px; height: 130px; margin: 0px; padding: 0px; border: 0px; overflow: hidden; z-index: 9998; position: absolute; left: 0px; top: 0px; box-shadow: 0px 0px 0px; background-color: transparent;"></iframe></div><iframe id="universal_pixel" allowtransparency="true" height="0" width="0" style="display:none;" src="./Success _ Mailchimp_files/up.html"></iframe></body></html>
<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->

<!-- jQuery first, then Other JS. -->
<script src="js/jquery-3.2.0.min.js"></script>


<!-- Js effects for material design. + Tooltips -->
<script src="js/material.min.js"></script>

<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="js/theme-plugins.js"></script>

<!-- Init functions -->
<script src="js/main.js"></script>

<!-- Load more news AJAX script -->
<script src="js/ajax-pagination.js"></script>

<!-- Select / Sorting script -->
<script src="js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.min.js"></script>

<!-- Widget with events script-->
<script src="js/simplecalendar.js"></script>

<!-- Lightbox plugin script-->
<script src="js/jquery.magnific-popup.min.js"></script>


<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>

</body>
</html>
<?php } ?>