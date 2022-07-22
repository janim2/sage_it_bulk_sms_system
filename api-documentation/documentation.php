<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>API - Documentation</title>
    <meta name="description" content="sms portal">
    <meta name="author" content="ticlekiwi">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/hightlightjs-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Source+Code+Pro:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" media="all">
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>

<body>
    <div class="left-menu">
        <div class="content-logo">
            <div class="logo">
                <img alt="platform by Emily van den Heever from the Noun Project"
                    title="platform by Emily van den Heever from the Noun Project" src="images/logo.png" height="32" />
                <span>API Documentation</span>
            </div>
            <button class="burger-menu-icon" id="button-menu-mobile">
                <svg width="34" height="34" viewBox="0 0 100 100">
                    <path class="line line1"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058">
                    </path>
                    <path class="line line2" d="M 20,50 H 80"></path>
                    <path class="line line3"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942">
                    </path>
                </svg>
            </button>
        </div>
        <div class="mobile-menu-closer"></div>
        <div class="content-menu">

            <ul>
                <li class="scroll-to-link active" data-target="content-get-started">
                    <a>Get Started</a>
                </li>
                <li class="scroll-to-link active" data-target="content-get-authentication">
                    <a>Authentication</a>
                </li>
                <li class="scroll-to-link" data-target="content-get-request">
                    <a>Request</a>
                </li>
                <li class="scroll-to-link" data-target="content-get-response">
                    <a>Response</a>
                </li>
                <li class="scroll-to-link" data-target="content-register-sendID">
                    <a>Sender ID Registration</a>
                </li>
                <li class="scroll-to-link" data-target="content-send-quickSMS">
                    <a>Send Quick SMS</a>
                </li>
                <!-- <li class="scroll-to-link" data-target="content-send-bulkSMS">
                    <a>Send Bulk SMS</a>
                </li> -->
                <li class="scroll-to-link" data-target="content-get-response-code">
                    <a>Response Codes</a>
                </li>
                <!-- <li class="scroll-to-link" data-target="content-errors">
                    <a>Errors</a>
                </li> -->
            </ul>
            <div class="content-infos">
                <div class="info"><b>Version:</b> 1.0</div>
                <div class="info"><b>Last Updated:</b> 17th July, 2022</div>
                <p></p>
                <div class="info"><a href="../dashboard.php">Return to Main Page</a></div>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="content-code"></div>
        <div class="content">
            <div class="overflow-hidden content-section" id="content-get-started">
                <h1>Get started</h1>
                <pre>
    API Endpoint

        http://sms.sageitservices.com/
                </pre>
                <p>Welcome to the SageIT SMS API v1.0! You can use our API to access SageIT SMS API endpoints, which can
                    get information from your account as well as sending data to your account.</p>

                <p>We have language bindings in Curl, PHP, and Python! You can view code examples in the dark area to
                    the right, and you can switch the programming language of the examples with the tabs in the top
                    right.</p>
                <p><b>For integration in other languages, please click <a target="blank"
                            href="http://sageit.com/contact-us">Here</a> or contact us : support@sageit.com</b></p>


            </div>

            <div class="overflow-hidden content-section" id="content-get-authentication">
                <h1>AUTHENTICATION</h1>
                <pre>

                </pre>
                <p>SageIT SMS uses API keys to allow access to the API. You can register or login for a new SageIT SMS API
                    key by clicking <a href="../index.php">here</a>.</p>

                <p>SageIT SMS expects for the API key to be included in all API requests to the server as a POST
                    parameter:</p>
                <h3 id='example'>Example</h3>
                <p><code>--data-raw '{
                        "email": "testing@gmail.com",
                        "api_key": "YOUR_API_KEY",
                        "senderID": "Ben",
                        "purpose": "For testing"

                        }'</code></p>

                <aside class="notice">
                    You must replace <code>YOUR_API_KEY</code> with your personal API key.
                </aside>


            </div>

            <div class="overflow-hidden content-section" id="content-get-request">
                <h1>Request</h1>

                <p>This API is built with REST and it uses HTTP verbs.</p>

                <p>Meaning every request made to the api must be RESTful with HTTP verbs such as GET, POST, PUT and
                    DELETE requests.</p>


            </div>

            <div class="overflow-hidden content-section" id="content-get-response">
                <h1>Response</h1>

                <p>All HTTP responses are of JSON format.</p>


            </div>

            <div class="overflow-hidden content-section" id="content-register-sendID">
                <h2>Sender ID Registration</h2>
                <pre><code class="bash">
                
             
            $endPoint = 'http://sms.sageitservices.com/api/sms/create_sender_id.php';
            $url = $endPoint;

            $data = [
                'email'         => "test@gmail.com",
                'api_key'       => "YOUR_API_KEY",
                'senderID'      => "sage",
                'purpose'       => "For sending SMS to new clients",
            ];

            $ch = curl_init();
            $headers = array();
            $headers[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $result = curl_exec($ch);
            return $result = json_decode($result, TRUE);
            curl_close($ch);


            <p>The above command returns JSON structured like this:</p>

            {
                "status": 200,
                "message": "Sender ID created. It would be verified within 10 mins. Call 054 880 1288 if you need it urgently."
            }
                </code></pre>

                <br>
                <pre><code class="json">        </code></pre>
                <p>Register your sender ids to send messages</p>
                <h3 id='http-request-20'>HTTP Request</h3>
                <p><code>POST http://sms.sageitservices.com/api/sms/create_sender_id.php</code></p>
                <h3 id='url-parameters-11'>URL Parameters</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th style="text-align: left">Required</th>
                            <th style="text-align: left">Type</th>
                            <th style="text-align: left">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>key</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">Your enabled api key</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left;">Email used for account creation</td>
                        </tr>
                        <tr>
                            <td>senderID</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left;">Sender ID to be registered. Must be at most 11 characters</td>
                        </tr>
                        <tr>
                            <td>purpose</td>
                            <td style="text-align: celeftnter">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">Reason for registering the sender id. eg For Sending SMS
                                Newsletters </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="overflow-hidden content-section" id="content-send-quickSMS">
                <h2>Send Quick SMS</h2>
                <pre><code class="bash">
                
            $endPoint = 'http://sms.sageitservices.com/api/sms/send_SMS.php';
            $url = $endPoint;

            $data = [
                'email'         => "test@gmail.com",
                'api_key'       => "YOUR_API_KEY",
                'senderID'      => "YOUR SENDER ID",
                'phoneNumber'   => "0270000000",
                'message'       => "message here"
            ];

            $ch = curl_init();
            $headers = array();
            $headers[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $result = curl_exec($ch);
            return $result = json_decode($result, TRUE);
            curl_close($ch);

            <p>The above command returns JSON structured like this:</p>

            {
                "status": 200,
                "message": "SMS sent",
                <!-- "summary": {
                    "_id": "A59CCB70-662D-45EF-9976-1EFAD249793D",
                    "type": "API QUICK SMS",
                    "total_sent": 2,
                    "contacts": 2,
                    "total_rejected": 0,
                    "numbers_sent": [
                        "0249706365",
                        "0203698970"
                    ],
                    "credit_used": 2,
                    "credit_left": 1483
                } -->
            }
            
                </code></pre>

                <br>
                <pre><code class="json">        </code></pre>
                <p>Send SMS to clients/contacts using contacts that you have without storing in any group first</p>
                <h3 id='http-request-17'>HTTP Request</h3>
                <p><code>POST http://sms.sageitservices.com/api/sms/send_SMS.php</code></p>
                <h3 id='url-parameters-8'>URL Parameters</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th style="text-align: left;">Required</th>
                            <th style="text-align: left">Type</th>
                            <th style="text-align: left">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>key</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">Your enabled api key</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">Email address used for account creation</td>
                        </tr>
                        <tr>
                            <td>sender ID</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">Sender ID of the message. Must be at most 11 characters</td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">string</td>
                            <td style="text-align: left">phone number eg. &#39;0203698970&#39;</td>
                        </tr>
                        <tr>
                            <td>message</td>
                            <td style="text-align: left">Yes</td>
                            <td style="text-align: left">text</td>
                            <td style="text-align: left">Message content</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>


                <!-- <p><strong>_id</strong> is the id of the message sent. You can store this id somewhere to check the delivery status of your message.
        This id is also called campaign id
        </p>
        <h3>Schedule Quick Bulk SMS</h3>
        <p>When scheduling quick SMS, you must set <code>is_schedule</code> to true and include the date and time in <code>schedule_date</code>
        payload in the format <code>YYYY-MM-DD hh:mm</code>.</p> -->
            </div>





            <div class="overflow-hidden content-section" id="content-get-response-code">
                <h2>Response Codes</h2>
                <pre><code class="bash">

                </code></pre>
                <p>
                    To get characters you need to make a POST call to the following url :<br>
                    <!--<code class="higlighted break-word">http://api.westeros.com/character/get</code> -->
                </p>
                <br>
                <pre><code class="json">

                </code></pre>
                <h4>QUERY PARAMETERS</h4>
                <table class="central-overflow-x">
                    <thead>
                        <tr>
                            <th>Status Code</th>
                            <th>Meaning</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>200</td>
                            <td>Success</td>
                        </tr>
                        <tr>
                            <td>400</td>
                            <td>Bad Request</td>
                        </tr>
                        <tr>
                            <td>401</td>
                            <td>Unauthorized</td>
                        </tr>
                        <tr>
                            <td>403</td>
                            <td>Forbidden</td>
                        </tr>
                        <tr>
                            <td>404</td>
                            <td>Not Found</td>
                        </tr>
                        <tr>
                            <td>405</td>
                            <td>Method Not Allowed</td>
                        </tr>
                        <tr>
                            <td>429</td>
                            <td>Too Many Requests</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>Internal Server Error</td>
                        </tr>
                        <tr>
                            <td>503</td>
                            <td>Service Unavailable</td>
                        </tr>
                    </tbody>
                </table>

                <p>There are also customized response codes and meaning:</p>

                <table>
                    <thead>
                        <tr>
                            <th>Status Code</th>
                            <th>Meaning</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2000</td>
                            <td>messages sent successfully</td>
                        </tr>
                        <tr>
                            <td>2001</td>
                            <td>Sender ID created</td>
                        </tr>
                        <tr>
                            <td>2006</td>
                            <td>Unapproved sender ID. Call 054 880 1288 if you need it urgently.</td>
                        </tr>
                        <tr>
                            <td>2008</td>
                            <td>sender ID not allowed</td>
                        </tr>
                        <tr>
                            <td>3000</td>
                            <td>credit is not enough to send message to recipients</td>
                        </tr>
                        <tr>
                            <td>4000</td>
                            <td>Invalid sender ID</td>
                        </tr>
                        <tr>
                            <td>4001</td>
                            <td>the email field, api field, recipient field, sender field and message field must not be empty</td>
                        </tr>
                        <tr>
                            <td>4006</td>
                            <td>Invalid api key</td>
                        </tr>
                    </tbody>
                </table>
            </div>


<!-- 
            <div class="overflow-hidden content-section" id="content-errors">
                <h2>Errors</h2>
                <p>
                    The Westeros API uses the following error codes:
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>Error Code</th>
                            <th>Meaning</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>X000</td>
                            <td>
                                Some parameters are missing. This error appears when you don't pass every mandatory
                                parameters.
                            </td>
                        </tr>
                        <tr>
                            <td>X001</td>
                            <td>
                                Unknown or unvalid <code class="higlighted">secret_key</code>. This error appears if you
                                use an unknow API key or if your API key expired.
                            </td>
                        </tr>
                        <tr>
                            <td>X002</td>
                            <td>
                                Unvalid <code class="higlighted">secret_key</code> for this domain. This error appears
                                if you use an API key non specified for your domain. Developper or Universal API keys
                                doesn't have domain checker.
                            </td>
                        </tr>
                        <tr>
                            <td>X003</td>
                            <td>
                                Unknown or unvalid user <code class="higlighted">token</code>. This error appears if you
                                use an unknow user <code class="higlighted">token</code> or if the user <code
                                    class="higlighted">token</code> expired.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
        </div>
        <div class="content-code"></div>
    </div>
    <!-- <a href="https://github.com/ticlekiwi/API-Documentation-HTML-Template" class="github-corner"
        aria-label="View source on Github" title="View source on Github"><svg width="80" height="80"
            viewBox="0 0 250 250"
            style="z-index:99999; fill:#70B7FD; color:#fff; position: fixed; top: 0; border: 0; right: 0;"
            aria-hidden="true">
            <path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path>
            <path
                d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2"
                fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path>
            <path
                d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z"
                fill="currentColor" class="octo-body"></path>
        </svg></a> -->
    <style>
        .github-corner:hover .octo-arm {
            animation: octocat-wave 560ms ease-in-out
        }

        @keyframes octocat-wave {

            0%,
            100% {
                transform: rotate(0)
            }

            20%,
            60% {
                transform: rotate(-25deg)
            }

            40%,
            80% {
                transform: rotate(10deg)
            }
        }

        @media (max-width:500px) {
            .github-corner:hover .octo-arm {
                animation: none
            }

            .github-corner .octo-arm {
                animation: octocat-wave 560ms ease-in-out
            }
        }

        @media only screen and (max-width:680px) {
            .github-corner>svg {
                right: auto !important;
                left: 0 !important;
                transform: rotate(270deg) !important;
            }
        }
    </style>
    <!-- END Github Corner Ribbon - to remove -->
    <script src="js/script.js"></script>
</body>

</html>