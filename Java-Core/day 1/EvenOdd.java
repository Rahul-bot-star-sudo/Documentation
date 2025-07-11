import java.util.Scanner;

public class EvenOdd {
 
	public static void main (String[] args) {
		Scanner sc = new Scanner(System.in);
		// Take a input from the user
		System.out.print("Enter a number: ");
		int num = sc.nextInt();
		// See number is odd or even
		if (num % 2 == 0) {
			System.out.println(num + " is Even");
		}
		else {
			System.out.println(num + " is Odd");
		}
	}
}
