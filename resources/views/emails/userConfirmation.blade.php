<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Add your custom CSS styles here */

        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Header styles */
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        /* Content styles */
        .content {
            padding: 20px;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #16ac09;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Footer styles */
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Medical Prescription</h1>
        </div>
        <div class="content">
            <h2>Hello, {{$name}}!</h2>
            <p>The QUOTATION has been created for your {{created_at}} dated PRESCRIPTION</p>
            <p>Confirm or Cancel the Quotation</p>
            <p>
                <a href="{{$confirm}}" class="button">Confirm</a>
            </p>
            <p>
                <a href="{{$cancel}}" class="button">Cancel</a>
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Medical Prescription. All rights reserved.
        </div>
    </div>
</body>
</html>
