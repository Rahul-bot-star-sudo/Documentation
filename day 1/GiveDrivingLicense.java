// Given a person age find if they should get a driving license or not
import java.util.Scanner;

public class GiveDrivingLicense {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        
        System.out.print("Enter your age...");
        int age = sc.nextInt();

        if (age >= 18) {
            System.out.println("You are eligible to get a driving license.");
        } else {
            System.out.println("You are not eligible. Wait until you are 18.");
        }
        sc.close();
    }
}
