	console.log("já");
		var submitForm = {
			displayPicInput: function() {
				$('#new-status-image').click(function () {
				    if (this.id == 'new-status-image') {
				        console.log('tókst');
				    }
				});
			}
		},

		var appConstructor = {
			submitForm: function() {
				this.displayPicInput();
			}
		}


		appConstructor.submitForm();
