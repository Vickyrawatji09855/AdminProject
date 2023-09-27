

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="mb-0" id="demo-form" action="phpmail.php" method="post" >
        <div class="col-xs-12 col-sm-12 col-md-6">
            <input id="input-name" type="text" class="form-control" name="your-name"
                placeholder="Your Name" required>
        </div>
        <!-- .col-md-6 end -->
        <div class="col-xs-12 col-sm-12 col-md-6">
            <input id="input-email" type="email" class="form-control" name="your-email"
                placeholder="Your Email" required>
        </div>
        <!-- .col-md-6 end -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input id="input-phone" type="tel" class="form-control" name="your-phone"
                placeholder="Your phone" maxlength="14">
        </div>
        <!-- .col-md-12 end -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <textarea id="input-message" class="form-control" name="your-message"
                rows="3" placeholder="Your Message"></textarea>
        </div>
        <div class="g-recaptcha" data-callback="recaptchaCallback"
            data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR">
        </div>
        <!-- .col-md-12 end -->
        <!-- onclick="onSubmit()" -->
        <div class="col-xs-12 col-sm-12 col-md-12 btn-in-header-in-section">
            <!-- <input  type="submit" id="submits" class="btn btn--primary" style="margin-top: 93px;"
                value="Free Consultation"> -->
            <button type="submit" id="submits" name="submit"
                class="btn btn--primary" style="margin-top: 93px;"
                value="Free Consultation">send</button>
        </div>
  
    </form>
</body>
</html>