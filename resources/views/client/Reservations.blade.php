<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>


@include('layouts.navbarClient')

<body class="bg-gray-200"
    style="box-sizing: border-box; margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; ">
    <section class="grid lg:grid-cols-2 grid-cols-1 mt-8">
        @foreach ($reservations as $resevation)
            <table width="100%" height="100%">

                <td align="center" class="h-[60vh] " width="100%" height="white">
                    <table width="600">

                        <tr>

                            <td align="left" class=""
                                style="border-radius: 2px; padding: 40px; position: relative; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05); vertical-align: top; "
                                bgcolor="#ffffff" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td width="80%">
                                            <h1 class="sm-text-lg all-font-roboto"
                                                style="font-weight: 700; line-height: 100%; margin: 0; margin-bottom: 4px; font-size: 24px;">
                                                {{ $resevation->event->titre }}</h1>
                                            <p class="sm-text-xs" style="margin: 0; color: #a0aec0; font-size: 14px;">
                                                Your reservation is now confirmed</p>
                                        </td>

                                    </tr>
                                </table>
                                <div style="line-height: 32px;">&zwnj;</div>
                                <table class="sm-leading-32" style="line-height: 28px; font-size: 14px;" width="100%"
                                    cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="sm-inline-block" style="color: #718096;" width="50%">Guest</td>
                                        <td class="sm-inline-block" style="font-weight: 600; text-align: right;"
                                            width="50%" align="right">{{ $resevation->user->name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="sm-w-1-4 sm-inline-block" style="color: #718096;" width="50%">
                                            Location</td>
                                        <td class="sm-w-3-4 sm-inline-block"
                                            style="font-weight: 600; text-align: right;" width="50%" align="right">
                                            {{ $resevation->event->lieu }}</td>
                                    </tr>
                                </table>
                                <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td style="padding-top: 24px; padding-bottom: 24px;">
                                            <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">
                                                &zwnj;</div>
                                        </td>
                                    </tr>
                                </table>


                                <table style="line-height: 28px; font-size: 14px;" width="100%" cellpadding="0"
                                    cellspacing="0" role="presentation">
                                    <tr>
                                        <td style="color: #718096;" width="50%">Date</td>
                                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">
                                            {{ date('Y-m-d', strtotime($resevation->event->date)) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #718096;" width="50%">Time</td>
                                        <td style="font-weight: 600; text-align: right;" width="50%" align="right">
                                            {{ date('H:i', strtotime($resevation->event->date)) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #718096;" width="50%">ticket</td>

                                        <td class="">
                                            <form action="{{ route('tickets', ['idReservation' => $resevation->id]) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="bg-gradient-to-r font-semibold rounded px-4 py-2 absolute right-8 from-pink-500 to-purple-500 text-white">Get
                                                    Ticket</button>
                                            </form>

                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </td>

            </table>
        @endforeach
    </section>
</body>

</html>

</section>
</body>

</html>
