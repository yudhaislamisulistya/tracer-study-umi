"use strict";

// Class Definition
var KTLogin = function () {
	var _login;

	var _showForm = function (form) {
		var cls = 'login-' + form + '-on';
		var form = 'kt_login_' + form + '_form';

		_login.removeClass('login-forgot-on');
		_login.removeClass('login-signin-on');
		_login.removeClass('login-signup-on');

		_login.addClass(cls);

		KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
	}

	var _handleSignInForm = function () {
		var validation;

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'), {
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email Harus Diisi'
							},
							emailAddress: {
								message: 'Email Tidak Sesuai Dengan Format'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password Harus Diisi'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					submitButton: new FormValidation.plugins.SubmitButton(),
					defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

		$('#kt_login_signin_submit').on('click', function (e) {
			e.preventDefault();

			validation.validate().then(function (status) {
				if (status != 'Valid') {
					swal.fire({
						text: "Mohon Maaf, Masih Ada Field atau Inputan Yang Kosong.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Handle forgot button
		$('#kt_login_forgot').on('click', function (e) {
			e.preventDefault();
			_showForm('forgot');
		});

		// Handle signup
		$('#kt_login_signup').on('click', function (e) {
			e.preventDefault();
			_showForm('signup');
		});
	}

	var _handleSignUpForm = function (e) {
		var validation;
		var form = KTUtil.getById('kt_login_signup_form');

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validation = FormValidation.formValidation(
			form, {
				fields: {
					fullname: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email address is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'The password is required'
							}
						}
					},
					cpassword: {
						validators: {
							notEmpty: {
								message: 'The password confirmation is required'
							},
							identical: {
								compare: function () {
									return form.querySelector('[name="password"]').value;
								},
								message: 'The password and its confirm are not the same'
							}
						}
					},
					agree: {
						validators: {
							notEmpty: {
								message: 'You must accept the terms and conditions'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

		$('#kt_login_signup_submit').on('click', function (e) {
			e.preventDefault();

			validation.validate().then(function (status) {
				if (status == 'Valid') {
					swal.fire({
						text: "All is cool! Now you submit this form",
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				} else {
					swal.fire({
						text: "Sorry, looks like there are some errors detected, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Handle cancel button
		$('#kt_login_signup_cancel').on('click', function (e) {
			e.preventDefault();

			_showForm('signin');
		});
	}

	var _handleForgotForm = function (e) {
		var validation;

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'), {
				fields: {
					nim: {
						validators: {
							notEmpty: {
								message: 'NIM Harus Diisi'
							},
						}
					},
					nama: {
						validators: {
							notEmpty: {
								message: 'Nama Harus Diisi'
							},
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email Harus Diisi'
							},
							emailAddress: {
								message: 'Email Tidak Sesuai Dengan Format'
							}
						}
					},
					nohp: {
						validators: {
							notEmpty: {
								message: 'Nomor Handhpone Harus Diisi'
							},
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					submitButton: new FormValidation.plugins.SubmitButton(),
					// defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

		// Handle submit button
		$('#kt_login_forgot_submit').on('click', function (e) {
			e.preventDefault();
			validation.validate().then(function (status) {
				var nama = $('#nama').val();
				var nim = $('#nim').val();
				var email = $('#email').val();
				var nohp = $('#nohp').val();
				if (status == 'Valid') {
					console.log("Anda Masuk di Halaman Valid Yah");
					$.ajax({
						type: "GET",
						url: HOST_URL + '/get_alumni/' + nim + '/' + nama.toUpperCase(),
						success: function (response) {
							if (response.status == 200) {
								Swal.fire({
									title: 'Apakah Anda Yakin?',
									text: "Selamat Data Anda Tersedia! Nama : "+nama+" Dengan NIM : "+nim+" Link Aktivasi Akan Dikirimkan Ke Email Anda",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Ya, Saya Ingin Aktivasi Akun!'
								}).then((result) => {
									var sweet_loader = '<div class="sweet_loader"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#e15b64" stroke="none"><animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"></animateTransform></path></div>';
									if (result.isConfirmed) {
										$.ajax({
											type: "POST",
											url: HOST_URL + "/post_activation",
											data: {
												nim: nim,
												nama: nama,
												email: email,
												nohp: nohp,
											},
											dataType: "JSON",
											beforeSend: function(){
												Swal.fire({
													html: '<h5>Loading...</h5>',
													showConfirmButton: false,
													onRender: function() {
														$('.swal2-content').prepend(sweet_loader);
													}
												});
											},
											success: function (response) {
												console.log(response);
												$('.swal2-content').hide();
												$('.swal2-container').hide();
												if (response.status == 200) {
													swal.fire({
														text: "Yuhuuuu!!! Kode Aktivasi Berhasil Dikirimkan Ke Email Anda.",
														icon: "success",
														buttonsStyling: false,
														confirmButtonText: "Ok!",
														customClass: {
															confirmButton: "btn font-weight-bold btn-light-primary"
														}
													}).then(function () {
														KTUtil.scrollTop();
													});
												}else if (response.status == 888){
													swal.fire({
														text: "Mohon Maaf, Anda Telang Mengajukan Aktivasi Akun",
														icon: "error",
														buttonsStyling: false,
														confirmButtonText: "Ok!",
														customClass: {
															confirmButton: "btn font-weight-bold btn-light-primary"
														}
													}).then(function () {
														KTUtil.scrollTop();
													});
												}else{
													swal.fire({
														text: "Mohon Maaf, Ada Kesalahan Dalam Sistem",
														icon: "warning",
														buttonsStyling: false,
														confirmButtonText: "Ok!",
														customClass: {
															confirmButton: "btn font-weight-bold btn-light-primary"
														}
													}).then(function () {
														KTUtil.scrollTop();
													});
												}
											}
										});
									}
								})
							} else {
								swal.fire({
									text: "Mohon Maaf NIM atau Nama Tidak Cocok",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function () {
									KTUtil.scrollTop();
								});
							}
						}
					});
				} else {
					swal.fire({
						text: "Mohon Maaf, Masih Ada Field atau Inputan Yang Kosong.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Handle cancel button
		$('#kt_login_forgot_cancel').on('click', function (e) {
			e.preventDefault();

			_showForm('signin');
		});
	}

	// Public Functions
	return {
		// public functions
		init: function () {
			_login = $('#kt_login');

			_handleSignInForm();
			_handleSignUpForm();
			_handleForgotForm();
		}
	};
}();

// Class Initialization
jQuery(document).ready(function () {
	KTLogin.init();
});