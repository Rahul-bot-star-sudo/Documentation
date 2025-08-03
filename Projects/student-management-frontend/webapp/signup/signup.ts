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
			return; // agar galat hai to baki code run na kare
		}
	// Data backend (Servlet) ko POST method se bhej rahe hain
  fetch('http://localhost:9494/student-management-frontend/signup', {
    method: 'POST', // HTTP POST method
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded' // Data servlet ke compatible format me bhejna
    },
    body: `username=${this.user.username}&email=${this.user.email}&password=${this.user.password}` // Form data format me bhejna
  })
  .then(res => res.json()) // Backend se JSON response milta hai usse parse karte hain
  .then(data => {
    if (data.status === 'success') {
      alert('Signup successful!');
    } else {
      alert('Signup failed!');
    }
  });
	// Reset form(Fields clear karata hai)
	this.user = {
		username: '',
		email: '',
		password: '',
		confirmPassword: ''
	};
  }
}