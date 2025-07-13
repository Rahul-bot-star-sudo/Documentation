import java.util.Scanner;

public class StudentManagement{
	public static void main(String[]  args){
		Scanner sc = new Scanner(System.in);
		int choice;

		while(true){
			System.out.println("=== Student Management System ===");
			System.out.println("1. Add Student");
			System.out.println("2. View Students");
			System.out.println("3. Exit");
			
			// take user input
			choice = sc.nextInt();

			// handle user choice
			switch (choice) {
				case 1:
					System.out.println("Feature to add student will go here.");
					break;
				case 2:
					System.out.println("feature to view Students will go here.");
					break;
				case 3:
					System.out.println("Exiting the program. Goodbye!");
					return; // end the program
				default:
					System.out.println("Invalid choce! please try again.");

			
			}

			System.out.println(); // just to add a line gap
		}
	}
}