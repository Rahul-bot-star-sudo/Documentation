import java.util.Scanner;
import java.util.ArrayList;
public class StudentManagement{
	public static void main(String[]  args){
		Scanner sc = new Scanner(System.in);
		ArrayList<Student> students = new ArrayList<>();
		int choice;

		while(true){
			System.out.println("=== Student Management System ===");
			System.out.println("1. Add Student");
			System.out.println("2. View Students");
			System.out.println("3. Exit");
			
			// take user input
			choice = sc.nextInt();

			sc.nextLine(); // consume leftover newline
			// handle user choice
			switch (choice) {
				case 1:
					// Add student 
					System.out.println("Enter name: ");
					String name = sc.nextLine();
					System.out.println("Enter roll number");	
					int roll = sc. nextInt();
					students.add(new Student(name, roll));
					System.out.println("Student add successfully!");
					
					break;
				case 2:
					// View students 
					if(students.isEmpty()) {
						System.out.println("No student added yet.");
					} else {
						System.out.println("List of Student:");
					
						for( Student s : students) {
							s.display();
						}
					}
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