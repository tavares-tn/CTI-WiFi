
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-pencil-square-o fa-fw "></i> 
            Configurações
            <span>> 
                Envio de alerta
            </span>
        </h1>
    </div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">


	<!-- START ROW -->

	<div class="row">

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-6">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">

				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="" id="checkout-form" class="smart-form" novalidate="novalidate">

							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="fname" placeholder="Primeiro nome">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="lname" placeholder="Ultimo nome">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="telefone" data-mask="(99) 999-9999">
										</label>
									</section>
                                                                    
                                                                    	<section class="col col-6">
                                                                            <span>Limite de dispositivos conectados:</span>
                                                                            
										<label class="input"> 
											<input >
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">
									Salvar
								</button>
							</footer>
						</form>
					</div>					
				</div>			
			</div>
		</article>
	</div>
</section>

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	
	// PAGE RELATED SCRIPTS

	// pagefunction
	
	var pagefunction = function() {

		var $checkoutForm = $('#checkout-form').validate({
		// Rules for form validation
			rules : {
				fname : {
					required : true
				},
				lname : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				phone : {
					required : true
				},
				country : {
					required : true
				},
				city : {
					required : true
				},
				code : {
					required : true,
					digits : true
				},
				address : {
					required : true
				},
				name : {
					required : true
				},
				card : {
					required : true,
					creditcard : true
				},
				cvv : {
					required : true,
					digits : true
				},
				month : {
					required : true
				},
				year : {
					required : true,
					digits : true
				}
			},
	
			// Messages for form validation
			messages : {
				fname : {
					required : 'Please enter your first name'
				},
				lname : {
					required : 'Please enter your last name'
				},
				email : {
					required : 'Please enter your email address',
					email : 'Please enter a VALID email address'
				},
				phone : {
					required : 'Please enter your phone number'
				},
				country : {
					required : 'Please select your country'
				},
				city : {
					required : 'Please enter your city'
				},
				code : {
					required : 'Please enter code',
					digits : 'Digits only please'
				},
				address : {
					required : 'Please enter your full address'
				},
				name : {
					required : 'Please enter name on your card'
				},
				card : {
					required : 'Please enter your card number'
				},
				cvv : {
					required : 'Enter CVV2',
					digits : 'Digits only'
				},
				month : {
					required : 'Select month'
				},
				year : {
					required : 'Enter year',
					digits : 'Digits only please'
				}
			},
	
			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
				
		var $registerForm = $("#smart-form-register").validate({

			// Rules for form validation
			rules : {
				username : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				},
				passwordConfirm : {
					required : true,
					minlength : 3,
					maxlength : 20,
					equalTo : '#password'
				},
				firstname : {
					required : true
				},
				lastname : {
					required : true
				},
				gender : {
					required : true
				},
				terms : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				login : {
					required : 'Please enter your login'
				},
				email : {
					required : 'Please enter your email address',
					email : 'Please enter a VALID email address'
				},
				password : {
					required : 'Please enter your password'
				},
				passwordConfirm : {
					required : 'Please enter your password one more time',
					equalTo : 'Please enter the same password as above'
				},
				firstname : {
					required : 'Please select your first name'
				},
				lastname : {
					required : 'Please select your last name'
				},
				gender : {
					required : 'Please select your gender'
				},
				terms : {
					required : 'You must agree with Terms and Conditions'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		var $reviewForm = $("#review-form").validate({
			// Rules for form validation
			rules : {
				name : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				review : {
					required : true,
					minlength : 20
				},
				quality : {
					required : true
				},
				reliability : {
					required : true
				},
				overall : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				name : {
					required : 'Please enter your name'
				},
				email : {
					required : 'Please enter your email address',
					email : '<i class="fa fa-warning"></i><strong>Please enter a VALID email addres</strong>'
				},
				review : {
					required : 'Please enter your review'
				},
				quality : {
					required : 'Please rate quality of the product'
				},
				reliability : {
					required : 'Please rate reliability of the product'
				},
				overall : {
					required : 'Please rate the product'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
		
		var $commentForm = $("#comment-form").validate({
			// Rules for form validation
			rules : {
				name : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				url : {
					url : true
				},
				comment : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				name : {
					required : 'Enter your name',
				},
				email : {
					required : 'Enter your email address',
					email : 'Enter a VALID email'
				},
				url : {
					email : 'Enter a VALID url'
				},
				comment : {
					required : 'Please enter your comment'
				}
			},

			// Ajax form submition
			submitHandler : function(form) {
				$(form).ajaxSubmit({
					success : function() {
						$("#comment-form").addClass('submited');
					}
				});
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		var $contactForm = $("#contact-form").validate({
			// Rules for form validation
			rules : {
				name : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				message : {
					required : true,
					minlength : 10
				}
			},

			// Messages for form validation
			messages : {
				name : {
					required : 'Please enter your name',
				},
				email : {
					required : 'Please enter your email address',
					email : 'Please enter a VALID email address'
				},
				message : {
					required : 'Please enter your message'
				}
			},

			// Ajax form submition
			submitHandler : function(form) {
				$(form).ajaxSubmit({
					success : function() {
						$("#contact-form").addClass('submited');
					}
				});
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		var $orderForm = $("#order-form").validate({
			// Rules for form validation
			rules : {
				name : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				phone : {
					required : true
				},
				interested : {
					required : true
				},
				budget : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				name : {
					required : 'Please enter your name'
				},
				email : {
					required : 'Please enter your email address',
					email : 'Please enter a VALID email address'
				},
				phone : {
					required : 'Please enter your phone number'
				},
				interested : {
					required : 'Please select interested service'
				},
				budget : {
					required : 'Please select your budget'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});

		// START AND FINISH DATE
		$('#startdate').datepicker({
			dateFormat : 'dd.mm.yy',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});
		
		$('#finishdate').datepicker({
			dateFormat : 'dd.mm.yy',
			prevText : '<i class="fa fa-chevron-left"></i>',
			nextText : '<i class="fa fa-chevron-right"></i>',
			onSelect : function(selectedDate) {
				$('#startdate').datepicker('option', 'maxDate', selectedDate);
			}
		});
		
	};
	
	// end pagefunction
	
	// Load form valisation dependency 
	loadScript("js/plugin/jquery-form/jquery-form.min.js", pagefunction);

</script>
