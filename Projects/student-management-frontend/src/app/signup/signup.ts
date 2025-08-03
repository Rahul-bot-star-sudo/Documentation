import { Component } from '@angular/core'; // use angular component decorator
import { FormsModule } from '@angular/forms'; // Required for template-driven forms
@Component({
  selector: 'app-signup',
  templateUrl: './signup.html',
  styleUrls: ['./signup.css'],
  standalone: true,
  imports: [FormsModule],
})
export class Signup {
	user = {
		username: '',
		email: '',
		password: '',
		confirmPassword: ''
	};
	// Ye method form submit hone par chalega
	onSubmit() {
		// validate karta hai ki password match hai
		if (this.user.password !== this.user.confirmPassword) {
			alert('Passwords do not match!');
			return;
		}
	console.log('User submitted:', this.user);
	alert('Signup successful!');
	 
	// Reset form(Fields clear karata hai)
	this.user = {
		username: '',
		email: '',
		password: '',
		confirmPassword: ''
	};
  }
}