<script src="<?=base_url()?>js/index.min.js">
</script>

<script>
    $(function () {
        $('.thx_black').on('click',function () {
            $(this).fadeOut();
        });

        // optionally, set maximum number of captcha validation on event:
        const maxNumberOfTries = 5;

        // captcha initial setup
        var myCaptcha = new jCaptcha({

            el: ".jCaptcha",
            canvasStyle: {
                // required properties for captcha stylings:
                width: 100,
                height: 15,
                textBaseline: 'top',
                font: '15px Arial',
                textAlign: 'left',
                fillStyle: '#3b3b3b'
            },
            canvas: {
                class: "jCaptchaCanvas",

            },
            // set callback function
            callback: function(response, $captchaInputElement, numberOfTries) {
                console.log(response);
                if (maxNumberOfTries === numberOfTries) {

                    // maximum attempts reached, so do something
                    // e.g. disable the form:
                    document.querySelector("form").removeEventListener("submit", formSubmit);
                    $captchaInputElement.classList.add("disabled");
                    $captchaInputElement.placeholder = "Maximum attempts reached!";
                    $captchaInputElement.setAttribute("disabled", "true");
                    document.querySelector("button").setAttribute("disabled", "true");

                    return;
                }

                if (response == 'success') {



                    // continue with form submit
                    $('form').submit();
                    $('.thx_black').fadeIn();
                }

                if (response == 'error') {


                  $('.jCaptcha').addClass('err');
                    $captchaInputElement.placeholder = "Please try again";

                }
            }

        });

        // validate captcha on form submit event
        function formSubmit(e) {
            e.preventDefault();

            // myCaptcha validate
            myCaptcha.validate();
        };

        document.querySelector("form").addEventListener("submit", formSubmit);
    })
</script>

<style>
	#page {
		height: 129vh;
	}
</style>
	<div class="left_content" style="padding-left: 4vw;    height: 101vh;
;    padding-top: 15vh;
">
		<div class="">
			<div class="info" style="font-size: 2vw">General<br>
				inquires</div>
			<div class="info"><div  class="sm_icon" id="bg_planet"></div>Pilatusstrasse 3, Zug, CH-6300 Switzerland</div>
			<div class="info green_footer"><div  class="sm_icon" id="bg_mail"></div>info@octolng.com</div>
			<div class="info blue_footer"><div  class="sm_icon" id="bg_phone"></div>+41 58 255 1 444</div>

		</div>

	</div>
	<div class="content " style="padding-right:0; padding-left: 5vw ">

		<h2 class="wow backInDown" style="text-align: center; color: #0C0C0C">Contact us</h2>
		<div class="cm_grey_txt">Please use the inquiry form below to receive more<br> information about octolng® project.</div>
        <div class="contact_form ">
			<form action="<?=base_url()?>main/send_mail" method="post">

				<div class="input ">
					<label>Name*</label>
					<input name="name" type="text">
				</div>

				<div class="input ">
					<label>Email*</label>
					<input name="email" type="text">
				</div>
				<div class="input input-block w100">
					<label>Message</label>
					<textarea  name="text" col="3"></textarea>
				</div>
				<div class="input input-block w100 text-center">
					<label>Add up the numbers</label>
                    <input style="width: 200px" class="jCaptcha" type="text" placeholder="Type in result please">
				</div>


                <button class="btn btn_blue padd_btn send_mail" type="submit" >Contact Us</button>
			</form>
		</div>


	</div>
</div>

<div id="contact_map"></div>
<div class="thx_black">
	<div class="thx_white">

		<div class="thx_round">✓</div>
		<h2>Thank you!</h2>
		<h3>We will contact you soon.</h3>
	</div>
</div>
<style>
    .jCaptchaCanvas{display: flex;margin: 3px}
    .err{
        transition-delay: .5s;
        border-bottom: 2px solid #ff5151 !important;

    }
</style>